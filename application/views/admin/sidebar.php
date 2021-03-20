<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-sidebar-custom sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('KontrolDaftarPeserta'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PPDB</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Heading -->
            <div class="sidebar-heading">
            </div>

            <!-- Nav Item - Atur Periode -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('KontrolPeriode'); ?>">
                    <i class="far fa-calendar-alt"></i>
                    <span>Atur Periode</span></a>
            </li>

            <!-- Nav Item - Data Pendaftar -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('KontrolDaftarPeserta'); ?>">
                    <i class="fas fa-list"></i>
                    <span>Daftar Peserta</span></a>
            </li>

            <!-- Nav Item - Penilaian -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('KontrolPenilaian'); ?>">
                    <i class="fas fa-calculator"></i>
                    <span>Penilaian</span></a>
            </li>

            <!-- Nav Item - Skala Saaty -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('KontrolSkala'); ?>">
                    <i class="fa fa-balance-scale"></i>
                    <span>Matriks Berpasangan</span></a>
            </li>

            <!-- Nav Item - Hasil Rekomendasi -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('KontrolRekomendasi'); ?>">
                    <i class="fas fa-user-graduate"></i>
                    <span>Hasil Rekomendasi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Logout -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->