@extends('layout.dashboard')

@section('main')
  <h2>Buyer Data</h2>
  <hr>
  <ul>
    <li>ID : <span>{{ $buyer->id }}</span></li>
    <li>Name : <span>{{ $buyer->name }}</span></li>
    <li>Age : <span>{{ $buyer->age }}</span></li>

  </ul>
@endsection
