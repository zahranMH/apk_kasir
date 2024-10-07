@extends('layouts.index')

@section('title', 'Detail Produk')

@section('navbar-title', 'Table Produk')

@section('content')

{{-- table admin --}}
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Tabel Produk</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="d-flex justify-content-between mt-2">
                            <div class="d-flex">
                                <a href="/produk/create" class="btn btn-info mx-3">Tambah Data</a>
                                <a href="/produk" class="btn btn-success">Kembali</a>
                            </div>
                            <form action="">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                    <div class="input-group input-group-outline">
                                        <label class="form-label">Search...</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <table class="table align-items-center mb-0 mt-1">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Produk</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- cek jika data kosong --}}
                                @if($produks->isEmpty())
                                    <tr>
                                        <td class="m-2 text-center text-secondary font-weight-bold text-xs" colspan="5">Data Produk Kosong</td>
                                    </tr>
                                @else
                                    @foreach ($produks as $produk)
                                        <tr>
                                            <td><span class="text-sm mx-3">{{ $loop->iteration }}</span></td>
                                            <td>
                                                <h6 class="mb-0 text-sm mx-3">{{ $produk->nama_produk }}</h6>
                                            </td>
                                            <td>
                                                <p class="text-xs text-secondary mb-0">Rp. {{ number_format($produk->harga) }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="">{{ $produk->stok }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="/produk/{{ $produk->id }}" class="badge badge-sm bg-gradient-secondary">Detail</a>
                                                    <a href="/produk/{{ $produk->id }}/edit" class="badge badge-sm bg-gradient-success">Edit</a>
                                                    <form action="/produk/{{ $produk->id }}" method="POST" class="p-0 m-0" onsubmit="alertConfirm(event)">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="badge badge-sm bg-gradient-danger border-0">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<main class="main-content position-absolute" style="top: 0; left: 0; right: 0; z-index: 100000;">
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3 d-flex justify-content-between">
                        <div class="d-block">
                            <h6 class="mb-0">Detail Produk</h6>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="img-container" style="flex: 0 0 auto; max-width: 50%; padding: 5px;">
                                        <img src="/storage/{{ $produk_satu->img_produk }}" alt="" class="img-fluid border rounded-3">
                                    </div>
                                    <div class="d-flex flex-column mx-4">
                                        <h6 class="mb-3 text-sm">{{ $produk_satu->nama_produk }}</h6>
                                        <span class="mb-2 text-xs">Harga :<span class="text-dark font-weight-bold ms-sm-2">Rp. {{ number_format($produk_satu->harga) }}</span></span>
                                        <span class="mb-2 text-xs">Stok :<span class="text-dark ms-sm-2 font-weight-bold">{{ $produk_satu->stok }}</span></span>
                                    </div>
                                </div>
                            </li>
                            <a href="/produk" class="btn btn-success w-25 mt-3">Kembali</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
