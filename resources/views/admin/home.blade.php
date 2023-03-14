@extends('layout.dashboard')

@section('main')
  <table class="table">
    <tr>
      <td>Concert</td>
      <td>{{ $concertCount }}</td>
      <td><a href="/dashboard/concerts" class="btn btn-dark"><i class="bi bi-eye"></i> See Concert</a></td>
    </tr>
    <tr>
      <td>Tickets</td>
      <td>{{ $ticketCount }}</td>
      <td><a href="/dashboard/tickets" class="btn btn-dark"><i class="bi bi-eye"></i> See Tickets</a></td>
    </tr>
    <tr>
      <td>Buyers</td>
      <td>{{ $buyerCount }}</td>
      <td><a href="/dashboard/buyers" class="btn btn-dark"><i class="bi bi-eye"></i> See Buyers</a></td>
    </tr>
  </table>
@endsection
