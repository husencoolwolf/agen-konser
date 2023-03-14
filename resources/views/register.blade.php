@extends('layout.main')

@section('context')
  <div class="row justify-content-center">
    <div class="col-md-5">
      @if (session()->has('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('failed') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif


      <form class="form-registration" action="/register" method="POST">
        {{-- setiap POST, kasih @ csrf sebagai perlindungan defaild dari laravel. di dalam tag form --}}
        @csrf
        <h1 class="h3 mb-3 font-weight-normal text-center">Registration Form</h1>
        <div class="form-floating">
          <input type="text" id="name" name="name"
            class="form-control rounded-top @error('name') is-invalid @enderror" placeholder="Name" required autofocus
            value="{{ old('name') }}" />
          <label for="name" class="sr-only">Name</label>
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
            placeholder="Email address" required value="{{ old('email') }}" />
          <label for="email" class="sr-only">Email address</label>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" id="password" name="password"
            class="form-control rounded-bottom @error('password') is-invalid @enderror" placeholder="Password" required />
          <label for="password" class="sr-only">Password</label>
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">
          Register
        </button>
        <small class="text-center d-block mt-3">Already Registered? <a href="/login">Login</a></small>
      </form>
    </div>
  </div>
@endsection
