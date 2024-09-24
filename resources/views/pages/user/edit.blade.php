@extends('layouts.index')

@section('title', 'Edit User')

@section('navbar-title', 'Form Edit User')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Form Edit User</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <form action="/user/{{ $user->id }}" class="m-3 ml-5 mr-5" method="POST" autocomplete="off">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="name">Nama User</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                                </div>
                                @error('name')
                                <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="email">Email User</label>
                                <div class="input-group input-group-outline">
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}" required>
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
                                        <option value="" disabled>Pilih Level</option>
                                        <option value="Admin" {{ $user->level == 'Admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="Petugas" {{ $user->level == 'Petugas' ? 'selected' : '' }}>Petugas</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info">Edit</button>
                        <a href="/user" class="btn btn-success">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
