<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Concert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
  public function index()
  {
    // $sold = Tiket::with('concert')->where("concert_id", $concert->id)->get()->count();
    // $data = Concert::with('tiket')->latest()->paginate(10);
    try {
      $data = DB::table('concerts as c')->select("*", DB::raw("(SELECT COUNT(id) from tikets where concert_id=c.id) as sold"))->latest('c.id')->paginate(10);
    } catch (\Illuminate\Database\QueryException $er) {
      dd($er->getSql());
    }
    // dd($data);
    // $data = DB::raw("SELECT c.id, c.title, c.location, c.start, c.finish, (SELECT t.id) FROM concerts c INNER JOIN tickets t on c.id=t.id ")->get();

    return view('guest.home', [
      'active' => 'home',
      'concertData' => $data
    ]);
  }
}
