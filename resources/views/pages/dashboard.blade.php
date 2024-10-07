@extends('layouts.index')

@section('title', 'Dashboard')

@section('navbar-title', 'Dashboard')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="fas fa-shoe-prints"></i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Jumlah Produk</p>
              <h4 class="mb-0">{{ $produk_total }}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0 text-sm"><a href="/produk">Lihat Daftar Produk</a></p>
          </div>
        </div>
      </div>

      @can('admin')

      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Jumlah User</p>
              <h4 class="mb-0">{{ $user_total }}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0 text-sm"><a href="/user">Lihat Daftar User</a></p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">people</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Jumlah Pelanggan</p>
              <h4 class="mb-0">{{ $pelanggan_total }}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0 text-sm"><a href="/pelanggan">Lihat Daftar Pelanggan</a></p>
          </div>
        </div>
      </div>

      @endcan

      @if (Auth()->user()->level != 'admin')

      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
              <div class="card-header p-3 pt-2">
                  <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 position-absolute">
                      <i class="material-icons opacity-10">shopping_cart</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Jumlah Penjualan</p>
                        <h4 class="mb-0">{{ $penjualan_total }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0 text-sm"><a href="/penjualan">Lihat Daftar Penjualan</a></p>
                </div>
          </div>
      </div>

        @endif

      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">attach_money</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total Uang Penjualan</p>
              <h4 class="mb-0">Rp. {{ number_format($total_harga_penjualan) }}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0 text-sm"><a href="/penjualan">Lihat Data Penjualan</a></p>
          </div>
        </div>
      </div>
    </div>
    <div class="row mb-4 mt-4">
      <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
        <div class="card">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-lg-5 col-5">
                <h6>Data Penjualan Terbaru</h6>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Kasir</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pelanggan</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Penjualan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Harga</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Bayar</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    @if(Auth()->user()->level == 'admin')

                      @if ($penjualan_admin->isEmpty())

                      <tr>
                          <td class=" m-2 text-center text-secondary font-weight-bold text-xs" colspan="5">Data Penjualan Kosong</td>
                      </tr>

                      @else

                      @foreach ($penjualan_admin as $penjualan)

                      <tr>
                          <td>
                              <div class="d-flex px-2 py-1">
                                  <div>

                                      @if ($penjualan->user->img_user != null)
                                        <img src="/storage/{{ $penjualan->user->img_user }}" class="avatar avatar-sm me-3 border-radius-lg" alt="{{ $penjualan->user->name }}">
                                      @else
                                          <img src="/assets/img/pf-kosong.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="{{ $penjualan->user->name }}">
                                      @endif

                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                      <h6 class="mb-0 text-sm">{{ $penjualan->user->name }}</h6>
                                  </div>
                              </div>
                          </td>
                          <td>
                              <p class="text-xs text-secondary mb-0 mx-3">{{ $penjualan->pelanggan->nama_pelanggan }}</p>
                          </td>
                          <td>
                              <p class="text-xs text-secondary mb-0">{{ $penjualan->tgl_penjualan }}</p>
                          </td>
                              <td class="align-middle text-center text-sm">
                              <span class="">Rp. {{ number_format($penjualan->total_harga) }}</span>
                          </td>
                          <td class="align-middle text-center text-sm">
                              <span class="">Rp. {{ number_format($penjualan->jumlah_bayar) }}</span>
                          </td>
                          <td class="align-middle text-center text-sm">
                              <a href="/DetailTransaksi/cetakStruk/{{ $penjualan->id }}" class="badge badge-sm bg-gradient-secondary">Cetak Struk</a>
                          </td>
                      </tr>

                      @endforeach

                      @endif

                    @else

                      @if($penjualan_petugas->isEmpty())

                      <tr>
                          <td class=" m-2 text-center text-secondary font-weight-bold text-xs" colspan="5">Data Penjualan Kosong</td>
                      </tr>

                      @else

                      @foreach ($penjualan_petugas as $penjualan)

                      <tr>
                          <td>
                              <div class="d-flex px-2 py-1">
                                  <div>
                                      @if ($penjualan->user->img_user != null)
                                          <img src="/storage/{{ $penjualan->user->img_user }}" class="avatar avatar-sm me-3 border-radius-lg" alt="{{ $penjualan->user->name }}">
                                      @else
                                          <img src="/assets/img/pf-kosong.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="{{ $penjualan->user->name }}">
                                      @endif
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                      <h6 class="mb-0 text-sm">{{ $penjualan->user->name }}</h6>
                                  </div>
                              </div>
                          </td>
                          <td>
                              <p class="text-xs text-secondary mb-0 mx-3">{{ $penjualan->pelanggan->nama_pelanggan }}</p>
                          </td>
                          <td>
                              <p class="text-xs text-secondary mb-0">{{ $penjualan->tgl_penjualan }}</p>
                          </td>
                              <td class="align-middle text-center text-sm">
                              <span class="">Rp. {{ number_format($penjualan->total_harga) }}</span>
                          </td>
                          <td class="align-middle text-center text-sm">
                              <span class="">Rp. {{ number_format($penjualan->jumlah_bayar) }}</span>
                          </td>
                          <td class="align-middle text-center text-sm">
                              <a href="/DetailTransaksi/cetakStruk/{{ $penjualan->id }}" class="badge badge-sm bg-gradient-secondary">Cetak Struk</a>
                          </td>
                      </tr>

                      @endforeach

                      @endif

                    @endif

                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

  {{-- alert berhasil --}}
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
