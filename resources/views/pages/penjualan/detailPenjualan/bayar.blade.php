@extends('pages.penjualan.detailPenjualan.bayar')

@section('modal-form')

<div class="row justify-content-center">
    <div class="col-md-7 mt-4">
        <div class="card">
            <div class="card-header pb-0 px-3 d-flex justify-content-between">
                <div class="d-block">
                    <h6 class="mb-0">Form Transaksi</h6>
                </div>
            </div>
            <div class="card-body pt-4 p-3">
                <ul class="list-group">
                    <form action="" method="POST" autocomplete="off">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="total_harga" class="form-label">Total Harga</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control" name="total_harga" id="total_harga" value="" required readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="jumlah_bayar" class="form-label">No Telepon</label>
                                <div class="input-group input-group-outline">
                                    <input type="number" class="form-control" name="jumlah_bayar" id="jumlah_bayar" value="" required>
                                </div>
                            </div>
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
