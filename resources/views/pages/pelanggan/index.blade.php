@extends('layouts.index')

@section('title', 'Pelanggan')

@section('navbar-title', 'Kelola Data Pelanggan')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Tabel Pelanggan</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <div class="d-flex justify-content-end mt-2">
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
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pelanggan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Telepon</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                  </tr>
                </thead>
                <tbody>

                {{-- cek jika data kosong --}}
                @if($pelanggans->isEmpty())

                <tr>
                    <td class=" m-2 text-center text-secondary font-weight-bold text-xs" colspan="4">Data Pelanggan Kosong</td>
                </tr>

                @else

                @foreach ($pelanggans as $pelanggan)
                  <tr>
                    <td>
                        <h6 class="mb-0 text-sm mx-3">{{ $pelanggan->nama_pelanggan }}</h6>
                    </div>
                    </td>
                    <td>
                        <p class="text-xs text-secondary mb-0">{{ $pelanggan->alamat }}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="">{{ $pelanggan->no_telepon }}</span>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <form action="/pelanggan/{{ $pelanggan->id }}" method="POST" class="p-0 m-0" onsubmit="alertConfirm(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="badge badge-sm bg-gradient-danger border-0">Hapus</button>
                        </form>
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

@endsection
