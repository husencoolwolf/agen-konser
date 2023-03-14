@extends('layout.dashboard')

@section('main')
  <h2>Tickets Data</h2>

  <a href="/dashboard/tickets" class="btn btn-dark my-3"><span data-feather="skip-back"></span> Back to Concert List</a>

  {{-- Alert Jika Sukses --}}
  @if (session('success'))
    <div class="alert alert-success my-3">
      {{ session('success') }}
    </div>
  @elseif (session('failed'))
    <div class="alert alert-danger my-3">
      {{ session('failed') }}
    </div>
  @endif

  <div class="row my-3">
    <div class="col-md-4">
      <div class="text-center">
        <span class="badge bg-success">Checkin : {{ $checked }}</span>
      </div>
    </div>
    <div class="col-md-4">
      <div class="text-center">
        <span class="badge bg-warning">Not Checkin : {{ $total - $checked }}</span>
      </div>
    </div>
    <div class="col-md-4">
      <div class="text-center">
        <span class="badge bg-dark">Total : {{ $total }}</span>
      </div>
    </div>
  </div>
  {{-- Tabel data --}}
  <table class="table table-dark table-responsive">
    <thead>
      <th>ID</th>
      <th>Title</th>
      <th>Location</th>
      <th>Duration</th>
      <th>Checkin</th>
      <th>Buyer</th>
      <th>Action</th>
    </thead>
    <tbody>
      {{-- @dd($dataTicket) --}}
      @if ($dataTicket->count())
        @foreach ($dataTicket as $ticket)
          <tr>
            <td>{{ $ticket->concert->id }}</td>
            <td>{{ $ticket->concert->title }}</td>
            <td>{{ $ticket->concert->location }}</td>
            <td>{{ $ticket->concert->start }} - {{ $ticket->concert->finish }}</td>
            <td>
              @if ($ticket->is_used)
                <span class="badge bg-success">Yes</span>
              @else
                <span class="badge bg-yellow">Not</span>
              @endif
            </td>
            <td>{{ $ticket->buyer->name }}</td>
            <td>
              <a href="/dashboard/buyers/{{ $ticket->buyer->id }}" class="badge bg-dark"><span
                  data-feather="user"></span></a>
              <a href="/dashboard/buyers/{{ $ticket->buyer->id }}/edit" class="badge bg-success"><span
                  data-feather="edit"></span></a>
              <form action="/dashboard/tickets/{{ $ticket->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="badge bg-danger border-0"
                  onclick="return confirm('Are you sure to delete this tickets?')">
                  <span data-feather="x-circle"></span>
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      @else
        <tr>
          <td colspan="7" align="center"><strong>This Concert has no ticket / buyer</strong></td>
        </tr>
      @endif
    </tbody>
  </table>
  {{-- Paginator --}}
  {{ $dataTicket->links() }}
@endsection
