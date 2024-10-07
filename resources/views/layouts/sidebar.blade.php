<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="/assets/img/logos/logo.png" class="navbar-brand-img h-100" alt="main_logo" width="40" height="80">
        <span class="ms-1 font-weight-bold text-secondary">MitedShoes</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="/dashboard" style="{{ request()->is('dashboard') ? 'background-color: #e91e63;' : '' }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        {{-- cek jika admin --}}

        @can('admin')
        <li class="nav-item">
          <a class="nav-link text-white" href="/user" style="{{ request()->is('user*') ? 'background-color: #e91e63;' : '' }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">User</span>
          </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white " href="/pelanggan" style="{{ request()->is('pelanggan*') ? 'background-color: #e91e63;' : '' }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">people</i>
                </div>
                <span class="nav-link-text ms-1">Pelanggan</span>
            </a>
        </li>
        @endcan
        
        <li class="nav-item">
          <a class="nav-link text-white " href="/PetugasProduk" style="{{ request()->is('produk*', 'PetugasProduk*') ? 'background-color: #e91e63;' : '' }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">store</i>
            </div>
            <span class="nav-link-text ms-1">Produk</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="/penjualan" style="{{ request()->is('penjualan*', 'DetailTransaksi*') ? 'background-color: #e91e63;' : '' }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">shopping_cart</i>
            </div>
            <span class="nav-link-text ms-1">Penjualan</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="/profile" style="{{ request()->is('profile*') ? 'background-color: #e91e63;' : '' }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
            <form action="/logout" class="nav-link" method="POST" onsubmit="alertConfirmLogout(event)" style="position: relative; right: 5px;">
                @csrf
                <button class="text-white bg-transparent border-0 d-flex" type="submit">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">logout</i>
                  </div>
                  <span class="nav-link-text ms-1">Logout</span>
                </button>
            </form>
        </li>
      </ul>
    </div>
  </aside>
