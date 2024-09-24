@extends('pages.penjualan.index')

@section('modal-form')

<div class="row justify-content-center">
    <div class="col-md-7 mt-4">
        <div class="card">
            <div class="card-header pb-0 px-3 d-flex justify-content-between">
                <div class="d-block">
                    <h6 class="mb-0">Form Tambah Penjualan</h6>
                </div>
            </div>
            <div class="card-body pt-4 p-3">
                <ul class="list-group">
                    <form action="/penjualan" method="POST" autocomplete="off">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" value="{{ old('nama_pelanggan') }}" required>
                                </div>
                                @error('nama_pelanggan')
                                <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="no_telepon" class="form-label">No Telepon</label>
                                <div class="input-group input-group-outline">
                                    <input type="number" class="form-control" name="no_telepon" id="no_telepon" value="{{ old('no_telepon') }}" required>
                                </div>
                                @error('no_telepon')
                                <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <div class="input-group input-group-outline">
                                <textarea name="alamat" id="alamat" cols="20" rows="3" class="form-control" required></textarea>
                            </div>
                            @error('alamat')
                            <span class="text-xs text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-info mt-3">Simpan</button>
                        <a href="/penjualan" class="btn btn-success mt-3">Kembali</a>
                    </form>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

