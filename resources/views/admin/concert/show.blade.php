@extends('layout.dashboard')

@section('main')
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h2>{{ $concert->title }}</h2>

        <div class="action-button">
          <a href="/dashboard/concerts" class="btn btn-success">
            <span data-feather="arrow-left"></span> Back to Concerts Data
          </a>
          <a href="/dashboard/concerts/{{ $concert->id }}/edit" class="btn btn-warning">
            <span data-feather="edit"></span> Edit
          </a>
          <form action="/dashboard/concerts/{{ $concert->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger" onclick="return confirm('Are you sure to delete this concert?')">
              <span data-feather="x-circle"></span> Delete
            </button>
          </form>

        </div>
        @if ($concert->image)
          <img class="img-fluid my-4" src="{{ asset('storage/' . $concert->image) }}" alt="{{ $concert->title }}">
        @else
          <img class="img-fluid my-4" src="/img/agenx.png" alt="{{ $concert->title }}">
        @endif
        <h4>Concert Details</h4>
        <hr>
        <ul>
          <li>Title : <span>{{ $concert->title }}</span></li>
          <li>Location : <span>{{ $concert->location }}</span></li>
          <li>Capacity : <span>{{ $concert->capacity }}</span></li>
          <li>Tickets : <span>{{ $concert->capacity - $ticketsSold }}</span></li>
          <li>Start : <span>{{ $concert->start }}</span></li>
          <li>Finish : <span>{{ $concert->finish }}</span></li>
        </ul>

        <a href="/dashboard/concerts" class="btn btn-success my-3">
          <span data-feather="arrow-left"></span> Back to Concerts Data
        </a>

      </div>
    </div>
  </div>
@endsection
