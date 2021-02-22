<div id="wrapper">
  <!-- Sidebar -->
  <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" style="background-color: skyblue;" href="/">
      <div class="sidebar-brand-text mx-2 ">PT.KARUNIA INDAMED MANDIRI</div>
    </a>
    <li class="nav-item p-2" style="font-size: 15px">
      <center><b>Inventory</b></center>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
      <a class="nav-link" href="/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
      <a class="nav-link" href="/user">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Users</span></a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
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
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-tasks"></i>
        <span>Data Suplier</span></a>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-tasks"></i>
        <span>Data Customer</span></a>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-tasks"></i>
        <span>Barang Keluar</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item">
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
    </li>


    <div class="version" id="version-ruangadmin"></div>
  </ul>
  <!-- Sidebar -->
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <!-- TopBar -->
      <nav style="background-color: skyblue;" class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
        <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>
        <ul class="navbar-nav ml-auto">


          <div class="topbar-divider d-none d-sm-block"></div>
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
              <span class="ml-2 d-none d-lg-inline text-white small">fajar</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <!-- Topbar -->