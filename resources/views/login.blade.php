@extends('layout.main')

@section('context')
  <div class="form-signin row justify-content-center">
    <div class="col-md-6">
      @if (session('LoginError'))
        <div class="alert alert-danger">{{ session('LoginError') }}</div>
      @elseif (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      <form method="POST" class="">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Please Login</h1>
        <div class="form-floating">
          <input name="email" type="email"
            class="form-control @error('email')
            'is-inv alid'
          @enderror" id="inputEmail"
            placeholder="name@example.com" value="{{ old('email') }}" required>
          <label for="inputEmail">Email address</label>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input name="password" type="password"
            class="form-control @error('password')
            'is-invalid'
          @enderror" id="inputPassword"
            placeholder="Password" required>
          <label for="inputPassword">Password</label>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <hr class="my-3">
        <small class="my-2">Not Registered? <a href="/register">Register Now</a></small>
        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Login</button>
      </form>
    </div>
    </d>
  @endsection
