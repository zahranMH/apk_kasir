@extends('pages.produk.daftarProduk')

@section('modal-form')

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
                                    <img src="/storage/{{ $produk->img_produk }}" alt="" class="img-fluid border rounded-3">
                                </div>
                                <div class="d-flex flex-column mx-4">
                                    <h6 class="mb-3 text-sm">{{ $produk->nama_produk }}</h6>
                                    <span class="mb-2 text-xs">Harga :<span class="text-dark font-weight-bold ms-sm-2">Rp. {{ $produk->harga }}</span></span>
                                    <span class="mb-2 text-xs">Stok :<span class="text-dark ms-sm-2 font-weight-bold">{{ $produk->stok }}</span></span>
                                </div>
                            </div>
                        </li>
                        <a href="/PetugasProduk" class="btn btn-success w-25 mt-3">Kembali</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
