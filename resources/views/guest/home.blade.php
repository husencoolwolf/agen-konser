@extends('layout.main')

@section('context')
  <div id="video" class="d-flex justify-content-center align-items-center">
    <video src="{{ asset('storage/video/intro.mp4') }}" autoplay muted loop playsinline></video>
    <div id="quote-video" class="text-center">
      <h1 class="text-white display-1 ">Make More Moment</h1>
      <h3 class="text-white">Be More Alive</h3>
    </div>
  </div>
  @if ($concertData->count())
    <div class="bg-dark py-5">
      <div class="container col-5">
        <div class="card">
          <div class="card-header">
            Featured
          </div>
          <div class="card-body">
            <img src="{{ asset('storage/' . $concertData[0]->image) }}" class="img-fluid"
              alt="{{ $concertData[0]->title }}">
            <h5 class="card-title mt-1">{{ $concertData[0]->title }}</h5>
            <small>{{ $concertData[0]->location }}</small>
            <small class="text-muted"> | {{ date_format(date_create($concertData[0]->start), 'd M Y H:i') }} -
              {{ date_format(date_create($concertData[0]->finish), 'H:i') }}</small>
            <p><i class="bi bi-ticket-detailed-fill"></i> {{ $concertData[0]->capacity - $concertData[0]->sold }}</p>
            <a href="{{ route('buyer_product_detail', $concertData[0]->id) }}" class="btn btn-primary"><i
                class="bi bi-cart4"></i> Beli</a>
          </div>
        </div>
      </div>
    </div>
    @if ($concertData->skip(1)->count())
      <div class="bg-light py-5">
        <div class="container">
          {{-- Kalau data ke 2 dst ada maka tampilkan  --}}
          <div class="row py-4">
            @foreach ($concertData->skip(1) as $concert)
              <div class="col-lg-3 col-md-4 col-sm-6 my-3">
                <div class="card h-100">
                  <img src="{{ asset('storage/' . $concert->image) }}" class="img-fluid card-img-same-height"
                    alt="{{ $concert->title }}">
                  <div class="card-body mt-1">
                    <h5 class="card-title mt-1">{{ $concert->title }}</h5>
                    <small>{{ $concert->location }}</small>
                    <br>
                    <small class="text-muted">{{ date_format(date_create($concert->start), 'd M Y H:i') }} -
                      {{ date_format(date_create($concert->finish), 'H:i') }}</small>
                    <p class="card-text"><i class="bi bi-ticket-detailed-fill"></i>
                      {{ $concert->capacity - $concert->sold }}</p>
                  </div>
                  <div class="card-footer">
                    <a href="{{ route('buyer_product_detail', $concert->id) }}" class="btn btn-primary"><i
                        class="bi bi-cart4"></i>
                      Beli</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    @endif
  @else
    <div class="text-white">
      <h3>Sorry, There's no Concert held this time !</h3>
    </div>
  @endif
  <ul>
    <li>adwa</li>
    <li>adwa</li>
    <li>adwa</li>
    <li>adwa</li>
    <li>adwa</li>
    <li>adwa</li>
  </ul>
@endsection
