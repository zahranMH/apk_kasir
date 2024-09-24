@extends('layouts.index')

@section('title', 'Tambah Produk')

@section('navbar-title', 'Form Tambah Produk')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Form Tambah Produk</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <form action="/produk" class="m-3 ml-5 mr-5" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="nama_produk">Nama Produk</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="{{ old('nama_produk') }}" required>
                                </div>
                                @error('nama_produk')
                                <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="harga">Harga</label>
                                <div class="input-group input-group-outline">
                                    <input type="number" class="form-control" name="harga" id="harga" value="{{ old('harga') }}" required>
                                </div>
                                @error('harga')
                                <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="stok">Stok</label>
                                <div class="input-group input-group-outline">
                                    <input type="number" class="form-control" name="stok" id="stok" value="{{ old('stok') }}" required>
                                </div>
                                @error('stok')
                                <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="img_produk">Image Produk</label>
                                <div class="input-group input-group-outline">
                                    <input type="file" name="img_produk" id="img_produk" class="form-control">
                                </div>
                                @error('img_produk')
                                <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info">Tambah</button>
                        <a href="/produk" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
