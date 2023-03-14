<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Concert;
use Illuminate\Http\Request;

class DashboardTicketController extends Controller
{
  public function index()
  {
    $concert = Concert::latest()->paginate(10);
    return view('admin.ticket.index', [
      'dataConcert' => $concert
    ]);
  }
  public function show($id)
  {
    // $ticket = Tiket::with('concert', 'buyer')->where('concert_id', $id)->latest()->paginate(10);
    // $ticketChecked = Tiket::where([['concert_id', "=", "1"], ['is_used', "=", "1"]])->get()->count();
    $ticket = Tiket::where('concert_id', $id)->get()->load('concert');
    // dd();
    // dd($ticket);
    // $ticket = Tiket::where('concert_id', $concert->id)->latest();
    return view('admin.ticket.show', [
      'dataTicket' => $ticket
    ]);
  }
}
