@extends('layout.dashboard')

@section('main')
  <h2>Concert Data</h2>

  <a href="/dashboard/concerts/create" class="btn btn-dark my-3">Add New Concert</a>
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
              <a href="/dashboard/concerts/{{ $concert->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
              <a href="/dashboard/concerts/{{ $concert->id }}/edit" class="badge bg-success"><span
                  data-feather="edit"></span></a>
              <form action="/dashboard/concerts/{{ $concert->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="badge bg-danger border-0"
                  onclick="return confirm('Are you sure to delete this concert?')">
                  <span data-feather="x-circle"></span>
                </button>
              </form>
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
