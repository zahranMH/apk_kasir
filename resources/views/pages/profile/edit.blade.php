@extends('pages.profile.index')

@section('modal-form')

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3 d-flex justify-content-between">
                    <div class="d-block">
                        <h6 class="mb-0">Form Edit User</h6>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                        <form action="/profile/{{ $user->id }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <div class="input-group input-group-outline">
                                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                                        @error('email')
                                            <span class="text-xs text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group input-group-outline">
                                        <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                                    </div>
                                    @error('email')
                                        <span class="text-xs text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="detail_user" class="form-label">Detail</label>
                                <div class="input-group input-group-outline">
                                    <textarea name="detail_user" class="form-control" id="detail_user" cols="30" rows="10">{{ $user->detail_user }}</textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info mt-3">Simpan</button>
                            <a href="/profile" class="btn btn-success mx-2 w-25 mt-3">Kembali</a>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
