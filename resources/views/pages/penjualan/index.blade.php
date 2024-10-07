@extends('layouts.index')

@section('title', 'Penjualan')

@section('navbar-title', 'Kelola Data Penjualan')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Tabel Penjualan</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <div class="d-flex justify-content-between mt-2">
                    <a href="/penjualan/create" class="btn btn-info mx-3">Tambah Data</a>
                    <form action="">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group input-group-outline">
                                <label class="form-label">Search...</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Penjualan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Harga</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Bayar</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pelanggan</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                  </tr>
                </thead>
                <tbody>

                {{-- cek jika data kosong --}}
                @if($penjualans->isEmpty())

                <tr>
                    <td class=" m-2 text-center text-secondary font-weight-bold text-xs" colspan="5">Data Penjualan Kosong</td>
                </tr>

                @else

                    @can('admin')
                    @foreach ($penjualans_admin as $penjualan)
                    <tr>
                        <td>
                            <p class="text-sm mx-3">{{ $loop->iteration }}</p>
                        </td>
                        <td>
                            <p class="text-sm mx-3">{{ $penjualan->tgl_penjualan }}</p>
                        </td>
                        <td>
                            <p class="text-xs text-secondary mb-0">{{ number_format($penjualan->total_harga) }}</p>
                        </td>
                        <td>
                            <p class="text-xs text-secondary mb-0">{{ number_format($penjualan->jumlah_bayar) }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                        <span class="">{{ $penjualan->pelanggan->nama_pelanggan }}</span>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <div class="d-flex justify-content-center gap-2">

                                @if($penjualan->total_harga == 0 || $penjualan->jumlah_bayar == 0)
                                <a href="/DetailTransaksi/{{ $penjualan->id }}" class="badge badge-sm bg-gradient-info">Isi Keranjang</a>
                                @else
                                <a href="/DetailTransaksi/cetakStruk/{{ $penjualan->id }}" class="badge badge-sm bg-gradient-secondary">Cetak Struk</a>
                                @endif

                                <form action="/penjualan/{{ $penjualan->id }}" method="POST" class="p-0 m-0" onsubmit="alertConfirm(event)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge badge-sm bg-gradient-danger border-0">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    @endforeach

                    @endcan

                    @foreach ($penjualans as $penjualan)
                    <tr>
                        <td>
                            <p class="text-sm mx-3">{{ $loop->iteration }}</p>
                        </td>
                        <td>
                            <p class="text-sm mx-3">{{ $penjualan->tgl_penjualan }}</p>
                        </td>
                        <td>
                            <p class="text-xs text-secondary mb-0">{{ number_format($penjualan->total_harga) }}</p>
                        </td>
                        <td>
                            <p class="text-xs text-secondary mb-0">{{ number_format($penjualan->jumlah_bayar) }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                        <span class="">{{ $penjualan->pelanggan->nama_pelanggan }}</span>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <div class="d-flex justify-content-center gap-2">

                                @if($penjualan->total_harga == 0 || $penjualan->jumlah_bayar == 0)
                                <a href="/DetailTransaksi/{{ $penjualan->id }}" class="badge badge-sm bg-gradient-info">Isi Keranjang</a>
                                @else
                                <a href="/DetailTransaksi/cetakStruk/{{ $penjualan->id }}" class="badge badge-sm bg-gradient-secondary">Cetak Struk</a>
                                @endif

                                <form action="/penjualan/{{ $penjualan->id }}" method="POST" class="p-0 m-0" onsubmit="alertConfirm(event)">
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

{{-- modal --}}
<main class="main-content position-absolute" style="top: 0; left: 0; right: 0; z-index: 100000;">
    @yield('modal-form')
</main>

{{-- sweetalert --}}

<script>

    function alertConfirm(event) {
        event.preventDefault();
        const formTarget = event.target;

        Swal.fire({
        title: "Apakah anda yakin untuk menghapus data ini?",
        text: "Data yang sudah dihapus tidak bisa dikembalikkan kembali!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya Hapus",
        cancelButtonText: "Tidak"
        }).then((result) => {
        if (result.isConfirmed) {

            formTarget.submit();
        }
    });
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

@if (session('peringatan'))

<script>
  Swal.fire({
  title: "Peringatan!",
  text: "{{ session('peringatan') }}",
  icon: "warning"
});
</script>

@endif

@endsection
