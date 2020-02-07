<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('backend/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('backend/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('backend/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- tags css-->
    <link href="{{asset('backend/tags/tags.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/ckeditor/ck-image.css')}}" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="{{asset('backend/css/theme.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link type="text/css" rel="stylesheet" href="{{asset('backend/css/custom.css')}}"/>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
            <header class="header-mobile d-block d-lg-none">
                <div class="header-mobile__bar">
                    <div class="container-fluid">
                        <div class="header-mobile-inner">
                            <a class="logo" href="index.html">

                            </a>
                            <button class="hamburger hamburger--slider" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <nav class="navbar-mobile">
                    <div class="container-fluid">
                        <ul class="navbar-mobile__list list-unstyled">
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>

                            </li>
                             <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-users"></i>Users</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">

                                <li>
                                    <a href="index.html"> <i class="fa fa-user-plus"></i>Add New</a>
                                </li>
                                <li>
                                    <a href="add-category/create"><i class="fa fa-user"></i>All Users</a>
                                </li>

                            </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fa fa-newspaper-o"></i>News</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                        <a href="index.html"> <i class="fas fa-chart-bar"></i>News</a>
                                    </li>
                                    <li>
                                        <a href=""> <i class="fa fa-plus-square"></i>Manage News</a>
                                    </li>
                                    

                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                <i class="fas fa-file-alt"></i>Pages</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                        <a href="index.html"> <i class="fas fa-chart-bar"></i>Pages</a>
                                    </li>
                                    <li>
                                        <a href="index.html"> <i class="fa fa-plus-square"></i>Add Pages</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                <i class="fa fa-picture-o"></i>Media</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                        <a href="index.html"> <i class="fa fa-picture-o"></i>Library</a>
                                    </li>
                                    <li>
                                        <a href="index.html"> <i class="fa fa-plus-square"></i>Add New</a>
                                    </li>

                                </ul>
                            </li>

                        </ul>
                    </div>
                </nav>
            </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->

            @include('backend.partials.aside')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
            <div class="page-container">
            <!-- HEADER DESKTOP-->
                    @include('backend.partials.header')
            <!-- HEADER DESKTOP-->

                <!-- MAIN CONTENT-->
                    <div class="main-content">
                    {{-- include error section here i.e index --}}
                        @include('backend.partials.errors')
                    {{-- include main section content here i.e index --}}
                        @yield('main-section')
                    </div>
                <!-- END MAIN CONTENT-->

        <!-- END PAGE CONTAINER-->
            </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{asset('backend/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('backend/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('backend/vendor/slick/slick.min.js')}}"></script>
    <script src="{{asset('backend/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('backend/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('backend/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('backend/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('backend/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('backend/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('backend/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('backend/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    @include('sweetalert::alert')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    @yield('js')
    <script src="{{asset('backend/js/main.js')}}"></script>

</body>

</html>
<!-- end -->
