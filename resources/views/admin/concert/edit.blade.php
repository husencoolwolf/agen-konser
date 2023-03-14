@extends('layout.dashboard')

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit concert</h1>
  </div>
  <div class="col-lg-8">
    <form method="post" action="/dashboard/concerts/{{ $concert->id }}" class="mb-5" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title')
          is-invalid
        @enderror" id="title"
          name="title" value="{{ old('title', $concert->title) }}" required>
        @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <input type="text" class="form-control @error('location')
          is-invalid
        @enderror"
          id="location" name="location" value="{{ old('location', $concert->location) }}" required>
        @error('location')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="capacity" class="form-label">Capacity</label>
        <input type="number" class="form-control @error('capacity')
          is-invalid
        @enderror"
          id="capacity" name="capacity" value="{{ old('capacity', $concert->capacity) }}" min="1" required>
        @error('capacity')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="start" class="form-label">Start Time</label>
        <input type="datetime-local" class="form-control @error('start')
          is-invalid
        @enderror"
          id="start" name="start" value="{{ old('start', $concert->start) }}" required>
        @error('start')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="finish" class="form-label">Finish Time</label>
        <input type="datetime-local" class="form-control @error('finish')
          is-invalid
        @enderror"
          id="finish" name="finish" value="{{ old('finish', $concert->finish) }}" required>
        @error('finish')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="image">Image</label>
        {{-- buat input hidden yang berguna kalau user tidak merubah image --}}
        <input type="hidden" name="oldImage" value="{{ $concert->image }}">
        <img src="{{ asset('storage/' . $concert->image) }}" class="my-3 img-fluid col-sm-5 d-block" id="imagePreview">
        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image"
          accept="image/png, image/jpeg, image/bmp">
        @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Update Concert Data</button>
      <a href="/dashboard/concerts" class="btn btn-sm btn-light text-danger"><span
          data-feather="circle-x">Cancel</span></a>
    </form>
  </div>

  <script>
    $(document).ready(function() {
      window.addEventListener("trix-file-accept", function(event) {
        event.preventDefault();
        alert("File attachment not supported!");
      });

      $('#image').change(function() {
        const file = this.files[0];
        if (file) {
          let reader = new FileReader();
          reader.onload = function(event) {
            $('#imagePreview').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
    });
  </script>
@endsection
