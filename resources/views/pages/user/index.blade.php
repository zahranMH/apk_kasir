@extends('layouts.index')

@section('title', 'User')

@section('navbar-title', 'Kelola Data User')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Tabel User</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <div class="d-flex justify-content-between mt-2">
                    <a href="/user/create" class="btn btn-info mx-3">Tambah Data</a>
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
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Level</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                  </tr>
                </thead>
                <tbody>

                {{-- cek jika data kosong --}}
                @if($users->isEmpty())

                <tr>
                    <td class=" m-2 text-center text-secondary font-weight-bold text-xs" colspan="4">Data User Kosong</td>
                </tr>

                @else

                @foreach ($users as $user)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                            @if($user->img_user != null)
                                <img src="#" class="avatar avatar-sm me-3 border-radius-lg" alt="{{ $user->name }}">
                            @else
                                <img src="/assets/img/pf-kosong.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="{{ $user->name }}">
                            @endif
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                        </div>
                    </div>
                    </td>
                    <td>
                        <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="">{{ $user->level }}</span>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="/user/{{ $user->id }}/edit" class="badge badge-sm bg-gradient-success">Edit</a>
                            <form action="/user/{{ $user->id }}" method="POST" class="p-0 m-0" onsubmit="alertConfirm(event)">
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
