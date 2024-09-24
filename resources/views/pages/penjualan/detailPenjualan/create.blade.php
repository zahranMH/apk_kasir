@extends('pages.penjualan.detailPenjualan.index')

@section('modal-form')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3 d-flex justify-content-between">
                        <div class="d-block">
                            <h6 class="mb-0">Form Tambah Keranjang</h6>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            <form action="/DetailTransaksi" method="POST">
                                @csrf

                                {{-- id transaksi --}}
                                <input type="hidden" name="id_penjualan" value="{{ $data_penjualan->id }}">

                                {{-- id produk --}}
                                <input type="hidden" name="id_produk" value="{{ $produk_satu->id }}">

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="nama_produk" class="form-label">Nama Produk</label>
                                        <div class="input-group input-group-outline">
                                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="{{ $produk_satu->nama_produk }}" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="harga" class="form-label">Harga</label>
                                        <div class="input-group input-group-outline">
                                            <input type="hidden" name="harga_no_format" id="harga_no_format" value="{{ $produk_satu->harga }}">
                                            <input type="text" class="form-control" name="harga" id="harga" value="{{ number_format($produk_satu->harga) }}" required readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="qty" class="form-label">Qty</label>
                                        <div class="input-group input-group-outline">
                                            <input type="number" class="form-control" name="qty" id="qty" value="{{ old('qty') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="subtotal" class="form-label">Subtotal</label>
                                        <div class="input-group input-group-outline">
                                            <input type="hidden" id="subtotal_no_format" name="subtotal_no_format">
                                            <input type="text" class="form-control" name="subtotal" id="subtotal" value="{{ old('subtotal') }}" required readonly>
                                        </div>
                                    </div>
                                </div>

                                {{-- stok --}}
                                <input type="hidden" name="stok" id="stok" value="{{ $produk_satu->stok }}">

                                <button type="submit" class="btn btn-info mt-3">Simpan Keranjang</button>
                                <a href="/DetailTransaksi/{{ $data_penjualan->id }}" class="btn btn-success mx-2 w-25 mt-3">Kembali</a>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


{{-- script untuk subotal --}}
<script>

const Qty = document.getElementById('qty');
const Harga = document.getElementById('harga_no_format');
const Subtotal = document.getElementById('subtotal');
const SubtotalNoFormat = document.getElementById('subtotal_no_format');
const Stok = document.getElementById('stok');

Qty.addEventListener('input', function() {

    let qty = parseFloat(Qty.value);
    let stok = parseFloat(Stok.value);
    let harga = parseFloat(Harga.value);

    let hasil = qty * harga;

    if(qty > stok) {

        // sweetalert
        Swal.fire({
            title: "Peringatan",
            text: "Stok tidak mencukupi.",
            icon: "warning",
            willOpen: () => {
                const swalElement = document.getElementsByClassName('swal2-container')[0];
                swalElement.style.zIndex = '1000000';
            }
        });

        // kosongkan input
        Qty.value = "";
        Subtotal.value = "";
        subtotal_no_format.value = "";
    } else {
        if(Qty.value.trim() === "") {
            Subtotal.value = "";
            subtotal_no_format.value = "";
        } else {
            subtotal_no_format.value = hasil;
            Subtotal.value = new Intl.NumberFormat('id-ID', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(hasil);
        }
    }
});

</script>

@endsection

