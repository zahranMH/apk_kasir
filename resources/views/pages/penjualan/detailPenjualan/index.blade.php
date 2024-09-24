@extends('layouts.index')

@section('title', 'Produk')

@section('navbar-title', 'Kelola Data Produk')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-7 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3 d-flex justify-content-between">
                        <div class="d-block">
                            <h6 class="mb-0">Daftar Produk</h6>
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
                                    <h6 class="mb-3 text-sm ">Data Produk Kosong</h6>
                                </li>
                            @else
                                @foreach ($produks as $produk)
                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="img-container" style="flex: 0 0 auto; max-width: 25%; padding: 5px;">
                                            <img src="/storage/{{ $produk->img_produk }}" alt="" class="img-fluid border rounded-3">
                                        </div>
                                        <div class="d-flex flex-column mx-4">
                                            <h6 class="mb-3 text-sm">{{ $produk->nama_produk }}</h6>
                                            <span class="mb-2 text-xs">Harga :<span class="text-dark font-weight-bold ms-sm-2">Rp. {{ number_format($produk->harga) }}</span></span>
                                            <span class="mb-2 text-xs">Stok :<span class="text-dark ms-sm-2 font-weight-bold">{{ $produk->stok }}</span></span>
                                        </div>
                                        <div class="ms-auto text-end">
                                            <a class="btn btn-link text-dark px-3 mb-0" href="/DetailTransaksi/create/{{ $produk->id }}/{{ $data_penjualan->id }}">
                                                <i class="material-icons text-sm me-2">shopping_cart</i>Tambah
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

            {{-- keranjang --}}
            <div class="col-md-5 mt-4">
                <div class="card mb-4">
                    <div class="card-header pb-0 px-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0">Keranjang</h6>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-uppercase text-body mx-3 mt-4 text-xs font-weight-bolder mb-3">Daftar Barang Di Keranjang</h6>
                    <div class="card-body pt-4 p-3 overflow-auto" style="max-height: 500px;">
                        <form action="/DetailTransaksi" class="p-0 m-0 me-4" method="POST">

                            {{-- form delete --}}
                            @csrf
                            @method('DELETE')
                            <ul class="list-group">

                                @foreach ($detail_penjualans as $detail_penjualan)
                                    <li class="list-group-item border-0 d-flex align-items-center mb-2 border-radius-lg">
                                        <div class="d-flex align-items-center flex-grow-1">

                                            {{-- checkbox --}}
                                            <input type="checkbox" class="me-4" name="id_detail_penjualan[]" value="{{ $detail_penjualan->id }}">

                                            <div class="flex-grow-1">
                                                <h6 class="mb-1 text-dark text-sm">{{ $detail_penjualan->produk->nama_produk }}</h6>
                                                <span class="text-xs">Rp. {{ number_format($detail_penjualan->produk->harga) }}</span>
                                            </div>
                                            <div class="text-danger text-success text-sm font-weight-bold" style="margin-right:80px">
                                                {{ $detail_penjualan->jumlah_produk }}
                                            </div>
                                        </div>
                                        <div class="text-danger text-gradient text-sm font-weight-bold  ">
                                            Rp. {{ number_format($detail_penjualan->subtotal) }}
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                            <div class="text-end d-flex justify-content-between">
                                <p class="text-sm">Total Harga : <b>{{ number_format($total_semua) }}</b></p>
                                <button type="submit" class="btn btn-danger">
                                    <i class="material-icons text-sm">delete</i> Hapus Terpilih
                                </button>
                            </div>
                        </form>
                        </div>

                        {{-- form tambah tabel penjualan --}}
                        <form action="/penjualan/{{ $data_penjualan->id }}" class="p-0 m-0 d-flex flex-column align-items-center mt-2" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- total semua -->
                            <input type="hidden" name="total_harga" value="{{ $total_semua }}">

                            <div class="d-flex align-items-center w-100 mb-2">
                                <label for="jumlah_bayar" class="text-sm mx-3">Jumlah Bayar :</label>
                                <input type="text" id="jumlah_bayar" name="jumlah_bayar" class="mb-2 text-sm form-control" value="0" style="max-width: 150px;" oninput="formatCurrency(this)">
                            </div>
                            <button type="submit" class="btn btn-info w-75">
                                <i class="material-icons text-sm me-2">attach_money</i> Bayar
                            </button>
                        </form>

                    </div>
            </div>

        </div>
    </div>
</main>

{{-- modal --}}
<main class="main-content position-absolute" style="top: 0; left: 0; right: 0; z-index: 100000;">
    @yield('modal-form')
</main>

{{-- merubah format input jumlah bayar --}}
<script>
    function formatCurrency(input) {
        let value = input.value.replace(/[^0-9]/g, '');

        value = new Intl.NumberFormat('id-ID').format(value);

        input.value = value;
    }
</script>


@if (session('berhasil'))

<script>
  Swal.fire({
  title: "Berhasil!",
  text: "{{ session('berhasil') }}",
  icon: "success"
});
</script>

@endif

@if (session('info'))

<script>
  Swal.fire({
  title: "Peringatan!",
  text: "{{ session('info') }}",
  icon: "warning"
});
</script>

@endif

@endsection
