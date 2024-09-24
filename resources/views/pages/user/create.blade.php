@extends('layouts.index')

@section('title', 'Tambah User')

@section('navbar-title', 'Form Tambah User')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Form Tambah User</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <form action="/user" class="m-3 ml-5 mr-5" method="POST" autocomplete="off">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="name">Nama User</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                                </div>
                                @error('name')
                                <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="email">Email User</label>
                                <div class="input-group input-group-outline">
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                                </div>
                                @error('email')
                                <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="level">Level</label>
                                <div class="input-group input-group-outline">
                                    <select name="level" id="level" class="form-control" required>
                                        <option value="" selected>Pilih Level</option>
                                        <option value="admin">Admin</option>
                                        <option value="petugas">Petugas</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-outline">
                                    <input type="password" class="form-control" name="password" id="password" required>
                                    <button type="button" class="input-group-text cursor-pointer me-3" onclick="togglePasswordVisibility()" style="z-index: 500">
                                        <i id="password-icon" class="fa fa-eye-slash"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-info">Tambah</button>
                        <a href="/user" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- icon password eye --}}
<script>

    function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const passwordIcon = document.getElementById('password-icon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordIcon.classList.remove('fa-eye-slash');
        passwordIcon.classList.add('fa-eye');
    } else {
        passwordInput.type = 'password';
        passwordIcon.classList.remove('fa-eye');
        passwordIcon.classList.add('fa-eye-slash');
    }
}
</script>

@endsection
