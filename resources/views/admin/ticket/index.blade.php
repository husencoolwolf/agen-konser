@extends('layout.dashboard')

@section('main')
  <h2>Tickets Data</h2>

  <a href="/dashboard/tickets/create" class="btn btn-dark my-3">Make New Ticket</a>
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
  {{-- Tabel data --}}
  <table class="table table-dark table-responsive">
    <thead>
      <th>ID</th>
      <th>Title</th>
      <th>Location</th>
      <th>Capacity</th>
      <th>Duration</th>
      <th>Action</th>
    </thead>
    <tbody>
      @if ($dataConcert->count())
        @foreach ($dataConcert as $concert)
          <tr>
            <td>{{ $concert->id }}</td>
            <td>{{ $concert->title }}</td>
            <td>{{ $concert->location }}</td>
            <td>{{ $concert->capacity }}</td>
            <td>{{ $concert->start }} - {{ $concert->finish }}</td>
            <td>
              <a href="/dashboard/tickets/{{ $concert->id }}" class="btn bg-info text-dark"><span data-feather="eye"></span>
                Concert's Tickets</a>
            </td>
          </tr>
        @endforeach
      @else
        <tr>
          <td colspan="6" align="center"><strong>No Data Found</strong></td>
        </tr>
      @endif
    </tbody>
  </table>
  {{-- Paginator --}}
  {{ $dataConcert->links() }}
@endsection
