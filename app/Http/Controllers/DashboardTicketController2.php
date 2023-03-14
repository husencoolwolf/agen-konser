<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\Tiket;
use Illuminate\Http\Request;

class DashboardTicketController2 extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $concert = Concert::with('tiket')->latest()->paginate(10);
    return view('admin.ticket.index', [
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
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Tiket  $tiket
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $ticket = Tiket::with('concert', 'buyer')->where('concert_id', $id)->latest()->paginate(10);
    $ticketChecked = Tiket::where([['concert_id', "=", "$id"], ['is_used', "=", "1"]])->get()->count();
    $total = Tiket::where("concert_id", $id)->get()->count();
    // dd();
    // dd($ticket);
    // $ticket = Tiket::where('concert_id', $concert->id)->latest();
    return view('admin.ticket.show', [
      'dataTicket' => $ticket,
      'checked' => $ticketChecked,
      'total' => $total
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Tiket  $tiket
   * @return \Illuminate\Http\Response
   */
  public function edit(Tiket $tiket)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Tiket  $tiket
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Tiket $tiket)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Tiket  $tiket
   * @return \Illuminate\Http\Response
   */
  public function destroy(Tiket $tiket)
  {
    //
  }
}
