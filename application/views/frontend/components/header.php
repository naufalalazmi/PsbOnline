<body>

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid">

                <!-- Logo container-->
                <div class="logo">
                    <!-- Image Logo -->
                    <a href="<?php echo base_url('profile') ?>" class="logo">
                        <img src="<?php echo base_url('assets/frontend/images/logo-sm.png') ?>" alt="" height="32" class="logo-small">
                        <img src="<?php echo base_url('assets/frontend/images/logo.png') ?>" alt="" height="40" class="logo-large">&nbsp;&nbsp;<span class="text-light">MTs Raudhatussa'adah</span>
                    </a>

                </div>
                <!-- End Logo container-->


                <div class="menu-extras topbar-custom">


                    <ul class="list-inline float-right mb-0">
                        <!-- User-->
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?php echo base_url('assets/frontend/images/users/user-1.jpg') ?>" alt="user" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                <a class="dropdown-item" href="/logout"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                            </div>

                        </li>
                        <li class="menu-item list-inline-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                    </ul>
                </div>
                <!-- end menu-extras -->

                <div class="clearfix"></div>

            </div> <!-- end container -->
        </div>
        <!-- end topbar-main -->

        <!-- MENU Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">

                        <li class="has-submenu">
                            <a href="/profile"><i class="dripicons-meter"></i>Home</a>
                        </li>

                        <li class="has-submenu">
                            <a href="/users/pendaftaran"><i class="dripicons-briefcase"></i>Form Pendaftaran</a>
                        </li>

                        <li class="has-submenu">
                            <a href="/users/hasil"><i class="dripicons-briefcase"></i>Pengumuman</a>
                        </li>

                    </ul>
                    <!-- End navigation menu -->
                </div> <!-- end #navigation -->
            </div> <!-- end container -->
        </div> <!-- end navbar-custom -->
    </header>
    <!-- End Navigation Bar-->