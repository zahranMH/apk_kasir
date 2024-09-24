@extends('layouts.index')

@section('title', 'Produk')

@section('navbar-title', 'Kelola Data Produk')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3 d-flex justify-content-between">
                        <div class="d-block">
                            <h6 class="mb-0">Daftar Produk</h6>
                            <a href="/ProdukAdmin" class="text-xs font-weight-bolder" style="color: gold">Admin</a>
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
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            {{-- cek jika kosong --}}
                            @if($produks->isEmpty())
                                <li class="list-group-item border-0 d-flex justify-content-center align-items-center p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <h6 class="mb-3 text-sm">Data Produk Kosong</h6>
                                </li>
                            @else
                                @foreach ($produks as $produk)
                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg align-items-center">
                                    <div class="d-flex justify-content-between align-items-center w-100">
                                        <div class="img-container" style="flex: 0 0 auto; max-width: 25%; padding: 5px;">
                                            <img src="/storage/{{ $produk->img_produk }}" alt="" class="img-fluid border rounded-3">
                                        </div>
                                        <div class="d-flex flex-column mx-4">
                                            <h6 class="mb-3 text-sm">{{ $produk->nama_produk }}</h6>
                                            <span class="mb-2 text-xs">Harga :<span class="text-dark font-weight-bold ms-sm-2">Rp. {{ number_format($produk->harga) }}</span></span>
                                            <span class="mb-2 text-xs">Stok :<span class="text-dark ms-sm-2 font-weight-bold">{{ $produk->stok }}</span></span>
                                        </div>
                                        <div class="ms-auto text-end">
                                            <a class="btn btn-link text-dark px-3 mb-0" href="/detail/{{ $produk->id }}">
                                                <i class="material-icons text-sm me-2">info</i>Detail
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

{{-- modal --}}
<main class="main-content position-absolute" style="top: 0; left: 0; right: 0; z-index: 100000;">
    @yield('modal-form')
</main>

@endsection
