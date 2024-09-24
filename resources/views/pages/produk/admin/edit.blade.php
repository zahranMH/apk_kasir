@extends('layouts.index')

@section('title', 'Edit Produk')

@section('navbar-title', 'Form Edit Produk')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Form Edit Produk</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <form action="/produk/{{ $produk->id }}" class="m-3 ml-5 mr-5" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="nama_produk">Nama Produk</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
                                </div>
                                @error('nama_produk')
                                <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="harga">Harga</label>
                                <div class="input-group input-group-outline">
                                    <input type="number" class="form-control" name="harga" id="harga" value="{{ old('harga', $produk->harga) }}" required>
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
                                    <input type="number" class="form-control" name="stok" id="stok" value="{{ old('stok', $produk->stok) }}" required>
                                </div>
                                @error('stok')
                                <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="img_produk">Image Produk</label>
                                <div class="input-group input-group-outline">
                                    <input type="hidden" name="img_produk_lama" value="{{ $produk->img_produk }}">
                                    <input type="file" name="img_produk" id="img_produk" class="form-control">
                                    <button type="button" class="btn btn-secondary p-0 m-0 mx-3" style="width: 50px; border-radius: 10px;" data-bs-toggle="modal" data-bs-target="#modalImg">
                                        <i class="material-icons text-sm me-1">print</i>
                                    </button>
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

<!-- Modal -->
<div class="modal fade" id="modalImg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Img Produk</h1>
        </div>
        <div class="modal-body">
            <div class="img-container" style="flex: 0 0 auto; max-width: 100%; padding: 5px;">
                <img src="/storage/{{ $produk->img_produk }}" alt="" class="img-fluid border rounded-3">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

@endsection
