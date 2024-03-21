<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bakso Coffee</title>
    <!-- base:css -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
    <link rel="stylesheet" href="///cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

</head>

<body>
    <div class="row" id="proBanner">

    </div>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" url="dashbaord"><img src="images/logo.svg" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" url="dashboard"><img src="images/logo-mini.svg"
                        alt="logo" /></a>
                <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button"
                    data-toggle="minimize">
                    <span class="typcn typcn-th-menu"></span>
                </button>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item dropdown d-flex">
                        <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center"
                            id="messageDropdown" href="#" data-toggle="dropdown">
                            <i class="typcn typcn-message-typing"></i>
                            <span class="count bg-success">2</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="messageDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                                    </h6>
                                    <p class="font-weight-light small-text mb-0">
                                        The meeting is cancelled
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                                    </h6>
                                    <p class="font-weight-light small-text mb-0">
                                        New product launch
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow">
                                    <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                                    </h6>
                                    <p class="font-weight-light small-text mb-0">
                                        Upcoming board meeting
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown  d-flex">
                        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center"
                            id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="typcn typcn-bell mr-0"></i>
                            <span class="count bg-danger">2</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="typcn typcn-info-large mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">Application Error</h6>
                                    <p class="font-weight-light small-text mb-0">
                                        Just now
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="typcn typcn-cog mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">Settings</h6>
                                    <p class="font-weight-light small-text mb-0">
                                        Private message
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="typcn typcn-user-outline mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">New user registration</h6>
                                    <p class="font-weight-light small-text mb-0">
                                        2 days ago
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle  pl-0 pr-0" href="#" data-toggle="dropdown"
                            id="profileDropdown">
                            <i class="typcn typcn-user-outline mr-0"></i>
                            <span class="nav-profile-name">Wulan Indah Restiani</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="typcn typcn-cog text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item">
                                <i class="typcn typcn-power text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="typcn typcn-th-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">


            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <div class="d-flex sidebar-profile">
                            <div class="sidebar-profile-image">
                                {{-- <img src="images/faces/face29.png" alt="image"> --}}
                                {{-- <span class="sidebar-status-indicator"></span> --}}
                            </div>
                            <div class="sidebar-profile-name">
                                <p class="sidebar-name">
                                    Wulan Indah Restiani
                                </p>
                                <p class="sidebar-designation">
                                    Welcome
                                </p>
                            </div>
                        </div>
                        <div class="nav-search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Type to search..."
                                    aria-label="search" aria-describedby="search">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="search">
                                        <i class="typcn typcn-zoom"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <p class="sidebar-menu-title">Dash menu</p>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link">
                            <i class=" typcn typcn-home menu-icon"></i>
                            <span class="menu-title">Dashboard <span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('karyawan') }}" class="nav-link">
                            <i class=" typcn typcn-user-add menu-icon"></i>
                            <span class="menu-title">Karyawan</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="{{ url('kategori') }}" class="nav-link">
                            <i class="typcn typcn-device-desktop menu-icon"></i>
                            <span class="menu-title">Kategori</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ url('jenis') }}" class="nav-link">
                            <i class=" fas fa-table menu-icon"></i>
                            <span class="menu-title">Jenis</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('menu') }}" class="nav-link">
                            <i class="  typcn typcn-th-menu menu-icon"></i>
                            <span class="menu-title">Menu</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('stok') }}" class="nav-link">
                            <i class="fas fa-store menu-icon"></i>
                            <span class="menu-title">Stok</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('pelanggan') }}" class="nav-link">
                            <i class="typcn typcn-user menu-icon"></i>
                            <span class="menu-title">Pelanggan</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="{{ url('transaksi') }}" class="nav-link">
                            <i class=" fas fa-cash-register menu-icon"></i>
                            <span class="menu-title">Transaksi</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ url('meja') }}" class="nav-link">
                            <i class="fas fa-bell menu-icon"></i>
                            <span class="menu-title">Meja</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('pemesanan') }}" class="nav-link">
                            <i class="typcn typcn-tag menu-icon"></i>
                            <span class="menu-title">Pemesanan</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="{{ url('produk_titipan') }}" class="nav-link">
                            <i class="fas fa-store menu-icon"></i>
                            <span class="menu-title">Produk Titipan</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ url('tentang') }}" class="nav-link">
                            <i class=" typcn typcn-tag menu-icon"></i>
                            <span class="menu-title">Tentang Aplikasi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('laporan') }}" class="nav-link">
                            <i class="fas fa-store menu-icon"></i>
                            <span class="menu-title">Laporan Produk</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1></h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Home</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->

                        <!-- Main content -->
                        @yield('content')
                        <!-- /.content -->


                </div>
                @include('template.footer');
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
