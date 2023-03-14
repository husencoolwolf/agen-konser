<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Concert;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DashboardConcertController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $concert = Concert::latest()->paginate(10);
    // dd($concert);
    return view('admin.concert.index', [
      'dataConcert' => $concert
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.concert.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //validate request yang masuk
    $validator = Validator::make($request->all(), [
      'title' => 'required|max:255',
      'location' => 'required',
      'capacity' => 'required|numeric',
      'start' => 'required|after:' . Carbon::now(),
      'finish' => 'required|after: start',
      'image' => 'image|file|max:1024',
    ]);
    //Kalau terjadi kegagalan
    if ($validator->fails()) {
      return redirect('/dashboard/concerts')->with('failed', $validator->errors());
    }
    $validatedData = $request->all();

    if ($request->file('image')) {
      // ddd($request);
      $validatedData['image'] =  $request->file('image')->store('concert-image');
    }
    Concert::create($validatedData);
    return redirect('/dashboard/concerts')->with('success', 'New Concert Has Been Added!!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Concert  $concert
   * @return \Illuminate\Http\Response
   */
  public function show(Concert $concert)
  {
    $banyakTerjual = Tiket::with('concert')->where("concert_id", $concert->id)->get()->count();
    return view('admin.concert.show', [
      'ticketsSold' => $banyakTerjual,
      'concert' => $concert
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Concert  $concert
   * @return \Illuminate\Http\Response
   */
  public function edit(Concert $concert)
  {
    return view('admin.concert.edit', [
      'concert' => $concert
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Concert  $concert
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Concert $concert)
  {
    //validate request yang masuk
    $validator = Validator::make($request->all(), [
      'title' => 'required|max:255',
      'location' => 'required',
      'capacity' => 'required|numeric',
      'start' => 'required|after:' . Carbon::now(),
      'finish' => 'required|after: start',
      'image' => 'image|file|max:1024',
    ]);
    //Kalau terjadi kegagalan
    if ($validator->fails()) {
      return redirect('/dashboard/concerts')->with('failed', $validator->errors());
    }

    $validatedData = $request->all(
      ['title', 'location', 'capacity', 'start', 'finish']
    );

    if ($request->file('image')) {
      //cek jika ada image lama.
      if ($request->oldImage) {
        //maka delete gambar lama tsb
        Storage::delete($request->oldImage);
      }
      $validatedData['image'] = $request->file('image')->store('concert-image');
    }

    Concert::where('id', $concert->id)->update($validatedData);
    return redirect('/dashboard/concerts')->with('success', 'Concert Successfully Updated!!!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Concert  $concert
   * @return \Illuminate\Http\Response
   */
  public function destroy(Concert $concert)
  {
    //cek jika ada image lama dalam suatu artikel.
    if ($concert->image) {
      //maka delete gambar lama tsb
      Storage::delete($concert->image);
    }
    concert::destroy($concert->id);
    return redirect('/dashboard/concerts')->with('success', 'Concert Successfully Deleted');
  }
}
