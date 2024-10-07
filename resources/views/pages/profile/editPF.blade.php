@extends('pages.profile.index')

@section('modal-form')

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3 d-flex justify-content-between">
                    <div class="d-block">
                        <h6 class="mb-0">Edit Foto User</h6>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="img-container" style="flex: 0 0 auto; max-width: 50%;">

                                    @if (Auth()->user()->img_user == null)
                                        <img src="/assets/img/pf-kosong.jpg" alt="" class="img-fluid" style="border-radius: 5%;">
                                    @else
                                        <img src="/storage/{{ $user->img_user }}" alt="" class="img-fluid" style="border-radius: 5%;">
                                    @endif

                                </div>
                            </div>
                        </li>

                        <form action="/profile/editPF/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <label for="pf_user" class="form-label">Foto Profil User</label>
                                <div class="input-group input-group-outline">
                                    <input type="file" name="pf_user" id="pf_user" class="form-control" required>
                                    <input type="hidden" name="pf_user_lama" id="pf_user_lama" value="{{ $user->img_user }}" class="form-control">
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
