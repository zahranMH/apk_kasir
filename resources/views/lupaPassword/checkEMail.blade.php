@extends('lupaPassword.layout')

@section('title', 'Check Email')

@section('content-LPW')

<div class="card z-index-0 fadeIn3 fadeInBottom">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
      <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Check Email</h4>
      </div>
      <p class="text-center mt-5 fs-4 text-dark font-weight-bold"">
        Masukkan Email Pengguna
        Untuk Mereset Password
      </p>
    </div>
    <div class="card-body" style="position: relative; bottom: 35px;">
      <form action="checkEmail" class="text-start" method="POST" autocomplete="off">
        @csrf

        <div class="input-group input-group-outline my-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
          @error('email')
              <span class="text-xs text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="text-center">
          <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
          <a href="/" class="text-center text-sm" style="color: blue;">Kembali Ke Login</a>
        </div>
      </form>
</div>

@endsection
