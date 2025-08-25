<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title', 'Leasing Installment Management')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="token" content="{{csrf_token()}}" >

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Datatables css -->
    <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('assets/js/head.js') }}"></script>


</head>

<!-- body start -->

<body data-menu-color="light" data-sidebar="default">

    <!-- Begin page -->
    <div id="app-layout">

        <!-- Topbar Start -->
        <div class="topbar-custom">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                        <li>
                            <button class="button-toggle-menu nav-link">
                                <i data-feather="menu" class="noti-icon"></i>
                            </button>
                        </li>
                        <li class="d-none d-lg-block">
                            <h5 class="mb-0">Welcome Back, Alex</h5>
                        </li>
                    </ul>

                    <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">




                        <!-- User Dropdown -->
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/users/user-13.jpg" alt="user-image" class="rounded-circle" />
                                <span class="pro-user-name ms-1">Alex <i class="mdi mdi-chevron-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a class='dropdown-item notify-item' href='pages-profile.html'>
                                    <i class="mdi mdi-account-circle-outline fs-16 align-middle"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a class='dropdown-item notify-item' href='auth-lock-screen.html'>
                                    <i class="mdi mdi-lock-outline fs-16 align-middle"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a class='dropdown-item notify-item' href='auth-logout.html'>
                                    <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end Topbar -->

        <!-- Left Sidebar Start -->
        <div class="app-sidebar-menu">
            <div class="h-100" data-simplebar>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <div class="logo-box">
                        <a class='logo logo-light' href='index.html'>
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-light.png" alt="" height="24">
                            </span>
                        </a>
                        <a class='logo logo-dark' href='index.html'>
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="" height="24">
                            </span>
                        </a>
                    </div>

                    <ul id="side-menu">

                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i data-feather="home"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li>
                            <a href="#sidebarProduct" data-bs-toggle="collapse">
                                <i data-feather="users"></i>
                                <span> Products </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarProduct">
                                <ul class="nav-second-level">
                                    <li>
                                        <a class='tp-link' href='auth-login.html'>Product List</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='auth-register.html'>Add Product</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#sidebarCustomers" data-bs-toggle="collapse">
                                <i data-feather="users"></i>
                                <span> Customers </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarCustomers">
                                <ul class="nav-second-level">
                                    <li>
                                        <a class='tp-link' href='auth-login.html'>Customer List</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='auth-register.html'>Add Customer</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#sidebarInstallmentsPlans" data-bs-toggle="collapse">
                                <i data-feather="users"></i>
                                <span> Installments Plan </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarInstallmentsPlans">
                                <ul class="nav-second-level">
                                    <li>
                                        <a class='tp-link' href='auth-login.html'>Plans List</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='auth-register.html'>Add Plan</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#sidebarSales" data-bs-toggle="collapse">
                                <i data-feather="users"></i>
                                <span> Sales </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSales">
                                <ul class="nav-second-level">
                                    <li>
                                        <a class='tp-link' href='auth-login.html'>All Sales (Cash & Installment)</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='auth-register.html'>New Sale</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#sidebarInstallments" data-bs-toggle="collapse">
                                <i data-feather="users"></i>
                                <span> Installments </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarInstallments">
                                <ul class="nav-second-level">
                                    <li>
                                        <a class='tp-link' href='auth-login.html'>Due Installments</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='auth-register.html'>Paid Installments</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='auth-register.html'>Overdue Installments</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#sidebarResports" data-bs-toggle="collapse">
                                <i data-feather="users"></i>
                                <span> Reports </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarResports">
                                <ul class="nav-second-level">
                                    <li>
                                        <a class='tp-link' href='auth-login.html'>Sales Report (Cash vs
                                            Installment)</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='auth-register.html'>Pending Installments</a>
                                    </li>
                                    <li>
                                        <a class='tp-link' href='auth-register.html'>Customer Ledger</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="{{route("users.index")}}">
                                <i data-feather="users"></i>
                                <span> Users </span>
                            </a>
                        </li>


                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                @yield('content')
            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col fs-13 text-muted text-center">
                            &copy;
                            {{ date('Y') }} - Develop by <a
                                href="#!" class="text-reset fw-semibold">.....</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Vendor -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>

    

    @yield("script")
    
    <!-- App js-->
    <script src="{{ asset('assets/js/app.js') }}"></script>


</body>

</html>
