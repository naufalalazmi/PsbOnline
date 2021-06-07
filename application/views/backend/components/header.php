<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                <i class="ion-close"></i>
            </button>

            <div class="left-side-logo d-block d-lg-none">
                <div class="text-center">
                    <a href="<?php echo base_url('admin') ?>" class="logo"><img src="<?php echo base_url('assets/frontend/images/logo.png') ?>" height="40" alt="logo"></a>
                </div>
            </div>

            <div class="sidebar-inner slimscrollleft">

                <div id="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>

                        <li>
                            <a href="<?php echo base_url('admin') ?>" class="waves-effect">
                                <i class="dripicons-meter"></i>
                                <span> Dashboard</span>
                            </a>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-user-group"></i> <span> Pengguna </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="<?php echo base_url('admin/user/admin') ?>">Admin</a></li>
                                <li><a href="<?php echo base_url('admin/user/siswa') ?>">Calon PSB</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="<?php echo base_url('admin/pendaftaran') ?>" class="waves-effect">
                                <i class="dripicons-meter"></i>
                                <span> Pendaftaran</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('admin/pendaftaran/hasil') ?>" class="waves-effect">
                                <i class="dripicons-meter"></i>
                                <span> Hasil Tes</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div> <!-- end sidebarinner -->
        </div>
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                <!-- Top Bar Start -->
                <div class="topbar">

                    <div class="topbar-left	d-none d-lg-block">
                        <div class="text-center">
                            <a href="index.html" class="logo"><img src="<?php echo base_url('assets/frontend/images/logo.png') ?>" height="40" alt="logo">&nbsp;&nbsp;<span class="text-light font-weight-bold">Madrasah Tsanawiyah</span></a>
                        </div>
                    </div>

                    <nav class="navbar-custom">

                        <ul class="list-inline float-right mb-0">
                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="<?php echo base_url('assets/backend/images/users/user-1.jpg') ?>" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                    <a class="dropdown-item" href="#"><?php echo $_SESSION['username'] ?></a>
                                    <a class="dropdown-item" href="<?php echo base_url('admin/logout') ?>"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                </div>
                            </li>

                        </ul>

                        <ul class="list-inline menu-left mb-0">
                            <li class="list-inline-item">
                                <button type="button" class="button-menu-mobile open-left waves-effect">
                                    <i class="ion-navicon"></i>
                                </button>
                            </li>
                        </ul>

                        <div class="clearfix"></div>

                    </nav>

                </div>
                <!-- Top Bar End -->