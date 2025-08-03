<!Doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sidafarmticket</title>
  <link rel="shortcut icon" type="image/png" href="./assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar -->
      <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
          <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="dashboardadmin" class="text-nowrap logo-img">
              <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="" width="220" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
              <i class="ti ti-x fs-6"></i>
            </div>
          </div>
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
              <!-- Dashboard-->
              <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboardadmin') ? 'active' : '' }}" href="{{ url('dashboardadmin') }}" aria-expanded="false">
                  <i class="ti ti-home"></i>
                  <span class="hide-menu">Dashboard</span>
                </a>
              </li>

              <!-- Paket Wisata-->
              <li class="sidebar-item">
                <a class="sidebar-link justify-content-between {{ request()->is('paketwisata') ? 'active' : '' }}" 
                  href="{{ route('admin.paketwisata.index') }}" aria-expanded="false">
                  <div class="d-flex align-items-center gap-3">
                    <span class="d-flex">
                      <i class="ti ti-map"></i>
                    </span>
                    <span class="hide-menu">Paket Wisata</span>
                  </div>
                </a>
              </li>

              <!-- Pengunjung-->
              <li class="sidebar-item">
                <a class="sidebar-link justify-content-between  {{ request()->is('pengunjung') ? 'active' : '' }}"  
                  href="{{ route('admin.pengunjung.index') }}" aria-expanded="false">
                  <div class="d-flex align-items-center gap-3">
                    <span class="d-flex">
                      <i class="ti ti-users"></i>
                    </span>
                    <span class="hide-menu">Pengunjung</span>
                  </div>
                </a>
              </li>

              <!-- Petugas Scan-->
              <li class="sidebar-item">
                <a class="sidebar-link justify-content-between {{ request()->is('petugasscan') ? 'active' : '' }}"  
                  href="{{ route('admin.petugasscan.index') }}" aria-expanded="false">
                  <div class="d-flex align-items-center gap-3">
                    <span class="d-flex">
                      <i class="ti ti-scan"></i>
                    </span>
                    <span class="hide-menu">Petugas Scan</span>
                  </div>
                </a>
              </li>

              <!-- Order -->
              <li class="sidebar-item"> 
                <a class="sidebar-link justify-content-between {{ request()->is('order') ? 'active' : '' }}"  
                  href="{{ route('admin.order.index') }}" aria-expanded="false">
                  <div class="d-flex align-items-center gap-3">
                    <span class="d-flex">
                      <i class="ti ti-shopping-cart"></i>
                    </span>
                    <span class="hide-menu">Orders</span>
                  </div>
                </a>
              </li>

              <!-- Transaksi-->
              <li class="sidebar-item"> 
                <a class="sidebar-link justify-content-between {{ request()->is('transaction') ? 'active' : '' }}"  
                  href="{{ route('admin.transaction.index') }}" aria-expanded="false">
                  <div class="d-flex align-items-center gap-3">
                    <span class="d-flex">
                      <i class="ti ti-credit-card"></i>
                    </span>
                    <span class="hide-menu">Transactions</span>
                  </div>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </aside>

      <!-- Main content area -->
      <div class="body-wrapper">
        <header class="app-header">
          <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
              <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                  <i class="ti ti-menu-2"></i>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link " href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="ti ti-bell"></i>
                  <div class="notification bg-primary rounded-circle"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="dropdown-item">
                      Item 1
                    </a>
                    <a href="javascript:void(0)" class="dropdown-item">
                      Item 2
                    </a>
                  </div>
                </div>
              </li>
            </ul>
            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
              <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                
                <li class="nav-item dropdown">
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        </header>
        <div class="body-wrapper-inner">
          <div class="container-fluid">
            <div class="row ">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
    </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
</body>
</html>