@extends('layouts.index')

@section('title', 'Profile')

@section('navbar-title', 'Profile')

@section('content')

<div class="container-fluid px-2 px-md-4 mb-5">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
      <span class="mask  bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body w-75 mx-3 mx-md-8 mt-n8">
      <div class="d-flex gap-3">
        <div class="col-auto">
            <a href="/profile/{{ Auth()->user()->id }}" class="avatar position-relative" style="width: 350px; height: 365px;">

                @if (Auth()->user()->img_user == null)
                  <img src="/assets/img/pf-kosong.jpg" alt="profile_image" class="border-radius-lg shadow-sm">
                @else
                  <img src="/storage/{{ Auth()->user()->img_user }}" alt="profile_image" class="border-radius-lg shadow-sm">
                @endif

            </a>
        </div>
        <div class="row gx-4 mb-2">
            <div class="col-auto my-auto mx-3">
              <div class="h-100">
                <h5 class="mb-1">
                  {{ Auth()->user()->name }}
                </h5>
                <p class="mb-0 font-weight-normal text-sm">

                  @if (Auth()->user()->level == 'admin')
                    MitedShoes /<span style="color: gold"> Admin</span>
                  @elseif(Auth()->user()->level == 'petugas')
                    <span>MitedShoes / Petugas</span>
                  @endif

                </p>
              </div>
            </div>
          <div class="row">
              <div class="col-12 col-xl-12">
                <div class="card card-plain h-100">
                  <div class="card-header pb-0 p-3">
                    <div class="row">
                      <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-0">Informasi Profil</h6>
                      </div>
                      <div class="col-md-4 text-end">
                        <a href="/profile/{{ Auth()->user()->id }}/edit">
                          <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-3">
                    <p class="text-sm">

                        @if(Auth()->user()->detail_user != null)
                            {{ Auth()->user()->detail_user }}
                        @else
                            Hi, I’m Alec Thompson, Decisions: If you can’t
                            decide, the answer is no. If two equally difficult paths,
                            choose the one more painful in the short term (pain avoidance is
                            creating an illusion of equality).
                        @endif

                    </p>
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nama Lengkap:</strong> &nbsp; {{ Auth()->user()->name }}</li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{ Auth()->user()->email }}</li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Alamat:</strong> &nbsp; Indonesia</li>
                    </ul>
                  </div>
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

@if (session('peringatan'))

<script>
  Swal.fire({
  title: "Peringatan!",
  text: "{{ session('peringatan') }}",
  icon: "warning"
});
</script>

@endif

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

