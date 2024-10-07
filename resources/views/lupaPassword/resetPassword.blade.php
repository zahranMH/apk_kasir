@extends('lupaPassword.layout')

@section('title', 'Reset Password')

@section('content-LPW')

<div class="card z-index-0 fadeIn3 fadeInBottom">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
      <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Reset Password</h4>
      </div>
      <p class="text-center mt-5 fs-4 text-dark font-weight-bold"">
        Ubah Password Anda Menjadi Password Baru
      </p>
    </div>
    <div class="card-body">
      <form action="/resetPassword" class="text-start" method="POST" autocomplete="off">
        @csrf

        {{-- id user ketemu --}}
        <input type="hidden" name="id_user" id="id_user" value="{{ session('id_user') }}">

        <div class="input-group input-group-outline mb-3" name="email">
            <label class="form-label">Password</label>
            <input type="password" class="form-control pw" name="password" id="password" required>
            <button type="button" class="input-group-text cursor-pointer me-3" style="z-index: 500">
                <i id="password-icon-1" class="fa fa-eye-slash"></i>
            </button>
        </div>
        <div class="input-group input-group-outline mb-3" name="email">
            <label class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control pw" name="Kpassword" id="Kpassword" required>
            <button type="button" class="input-group-text cursor-pointer me-3" style="z-index: 500">
                <i id="password-icon-2" class="fa fa-eye-slash"></i>
            </button>
        </div>

        <div class="text-center">
          <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Reset</button>
        </div>
      </form>
</div>


@endsection
