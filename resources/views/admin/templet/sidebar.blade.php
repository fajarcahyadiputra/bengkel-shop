<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" style="background-color: skyblue;"
            href="/">
            <div class="sidebar-brand-text mx-2 ">YOGAMOTOSHOP</div>
        </a>
        <li class="nav-item p-2" style="font-size: 15px">
            <center><b>ADMIN</b></center>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item {{ request()->is('/dashboard') ? 'active' : '' }}">
            <a class="nav-link {{ request()->is('/dashboard') ? 'text-primary' : '' }}" href="/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item {{ request()->is('user') ? 'active' : '' }}">
            <a class="nav-link {{ request()->is('user') ? 'text-primary' : '' }}" href="/user">
                <i class="fas fa-users"></i>
                <span>Data Pengguna</span></a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item {{ request()->is('kategori') ? 'active' : '' }}">
            <a class="nav-link {{ request()->is('kategori') ? 'text-primary' : '' }}" href="/kategori">
                <i class="fas fa-sitemap"></i>
                <span>Kategori Barang</span></a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item {{ request()->is('barang') ? 'active' : '' }}">
            <a class="nav-link {{ request()->is('barang') ? 'text-primary' : '' }}" href="/barang">
                <i class="fas fa-boxes"></i>
                <span>Data Barang</span></a>
        </li>


        <hr class="sidebar-divider">

        <li class="nav-item {{ request()->is('rekening') ? 'active' : '' }}">
            <a class="nav-link {{ request()->is('rekening') ? 'text-primary' : '' }}" href="/rekening">
                <i class="fas fa-boxes"></i>
                <span>Data Rekening</span></a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item {{ request()->is('transaksi') ? 'active' : '' }}">
            <a class="nav-link {{ request()->is('transaksi') ? 'text-primary' : '' }}" href="/transaksi">
                <i class="fas fa-shopping-cart"></i>
                <span>Transaksi</span></a>
        </li>




        <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Data Barang</span>
      </a>
      <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Data Barang</h6>
          <a class="collapse-item" href="">Barang</a>
          <a class="collapse-item" href="">Penyesuain Stok</a>
        </div>
      </div>
    </li> -->

        <hr class="sidebar-divider">
        {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Report</span>
      </a>
      <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Report</h6>
          <a class="collapse-item" href="">Barang Keluar</a>
          <a class="collapse-item" href="">Barang Masuk</a>
        </div>
      </div>
    </li> --}}


        <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
            <nav style="background-color: skyblue;"
                class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">


                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                            <span class="ml-2 d-none d-lg-inline text-white small">{{ auth()->user()->nama }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="dropdown-item" type="submit">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- Topbar -->
