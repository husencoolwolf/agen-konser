<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Concert;
use App\Models\Tiket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    $konser = Concert::all();
    $jumlahKonser = $konser->count();
    $pembeli = Buyer::all();
    $jumlahPembeli = $pembeli->count();
    $tiket = Tiket::all();
    $jumlahTiket = $tiket->count();


    return view("admin.home", [
      'active' => 'home',
      'ticketCount' => $jumlahTiket,
      'buyerCount' => $jumlahPembeli,
      'concertCount' => $jumlahKonser
    ]);
  }
}
