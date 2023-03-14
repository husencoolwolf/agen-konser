@extends('layout.dashboard')
{{-- 
  - setiap form diberi @error pada blade template validator build in di laravel.
  - pada tag input diberi class is-invalid agar inputan jadi merah (Pertanda Error)
  - setiap tag di beri value dari inputan sebelumnya yang masih salah. dengan fungsi old()
  - setiap form dibawahnya akan muncul error message dalam div.invalid-feedback.
  --}}
@section('main')
  <form action="/dashboard/concerts" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title')
          is-invalid
        @enderror" id="title"
        name="title" value="{{ old('title') }}" required>
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
        @enderror" id="location"
        name="location" value="{{ old('location') }}" required>
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
        @enderror" id="capacity"
        name="capacity" value="{{ old('capacity') }}" min="1" required>
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
        id="start" name="start" value="{{ old('start') }}" required>
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
        id="finish" name="finish" value="{{ old('finish') }}" required>
      @error('finish')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="image">Image</label>
      <img src="/img/agenx.png" class="my-3 img-fluid col-sm-5 d-block" id="imagePreview">
      <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image"
        accept="image/png, image/jpeg, image/bmp">
      @error('image')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Create Concert</button>
  </form>

  <script>
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
  </script>
@endsection
