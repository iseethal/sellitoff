<!DOCTYPE html>
<html lang="en">



<head>


    {{-- csrf link --}}

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="Spruha -  Admin Panel laravel Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin laravel template, template laravel admin, laravel css template, best admin template for laravel, laravel blade admin template, template admin laravel, laravel admin template bootstrap 4, laravel bootstrap 4 admin template, laravel admin bootstrap 4, admin template bootstrap 4 laravel, bootstrap 4 laravel admin template, bootstrap 4 admin template laravel, laravel bootstrap 4 template, bootstrap blade template, laravel bootstrap admin template">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('backend/assets/img/brand/sell-logo.png') }}" type="image/x-icon" />

    <!-- Title -->
    <title> sellitoff </title>

    <!-- Bootstrap css-->
    <link href="{{ asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Icons css-->
    <link href="{{ asset('backend/assets/plugins/web-fonts/icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/web-fonts/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/web-fonts/plugin.css') }}" rel="stylesheet" />

    <!-- Style css-->
    <link href="{{ asset('backend/assets/css/style/style.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/skins.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/dark-style.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/colors/default.css') }}" rel="stylesheet">

    <!-- Color css-->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('backend/assets/css/colors/color.css') }}">

    <!-- Select2 css-->
    <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!-- Mutipleselect css-->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/multipleselect/multiple-select.css') }}">

    <!-- Internal DataTables css-->
    <link href="{{ asset('backend/assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css') }}" rel="stylesheet" />

    <!-- Sidemenu css-->
    <link href="{{ asset('backend/assets/css/sidemenu/sidemenu.css') }}" rel="stylesheet">

    <!-- Switcher css-->
    <link href="{{ asset('backend/assets/switcher/css/switcher.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/switcher/demo.css') }}" rel="stylesheet">

    <!-- Datepicker css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/model-datepicker/css/datepicker.css') }}">



</head>




<body class="main-body leftmenu">



    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ asset('backend/assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- End Loader -->

    <!-- Page -->
    <div class="page">

        <!-- Sidemenu -->
        <div class="main-sidebar main-sidebar-sticky side-menu">
            <div>
                <a class="main-logo">
                    <img src="{{ asset('backend/assets/img/brand/sell-logo.png') }}" class="header-brand-img desktop-logo"  alt="logo">
                    <img src="{{ asset('backend/assets/img/brand/sell-logo.png') }}" class="header-brand-img icon-logo rounded-circle" style="height: 103px;" alt="logo">
                    <img src="{{ asset('backend/assets/img/brand/sell-logo.png') }}" class="header-brand-img desktop-logo theme-logo rounded-circle" style="height: 103px;"
                        alt="logo">
                    <img src="{{ asset('backend/assets/img/brand/icon.png') }}" class="header-brand-img icon-logo theme-logo" alt="logo">
                </a>
            </div>
            <div class="main-sidebar-body">
                <ul class="nav">

                    <li class="nav-header"><span class="nav-label">Dashboard</span></li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.admin-dashboard') }}">
                            <span class="shape1"></span><span class="shape2"></span>
                            <i class="ti-home sidemenu-icon"></i>
                            <span class="sidemenu-label">Dashboard</span>
                        </a>
                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span
                                class="shape2"></span><i class="ti-agenda sidemenu-icon"></i><span
                                class="sidemenu-label">Questions</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href=""> All Questions</a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span
                                class="shape2"></span><i class="ti-agenda sidemenu-icon"></i><span
                                class="sidemenu-label">Forms</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href=""> All Forms</a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span
                                class="shape2"></span><i class="ti-agenda sidemenu-icon"></i><span
                                class="sidemenu-label">Feedbacks</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="">View All</a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><span class="shape1"></span><span
                                class="shape2"></span><i class="ti-agenda sidemenu-icon"></i><span
                                class="sidemenu-label">CRM</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="">Customers</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href=""> Events</a>
                            </li>

                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href=""> Customer Events</a>
                            </li>

                        </ul>
                    </li> --}}

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('slider.all')}}">
                            <span class="shape1"></span><span class="shape2"></span>
                            <i class="fa fa-sliders sidemenu-icon"></i>
                            <span class="sidemenu-label">Sliders</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.all')}}">
                            <span class="shape1"></span><span class="shape2"></span>
                            <i class="ti-list sidemenu-icon"></i>
                            <span class="sidemenu-label">Categories</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('subcategory.all')}}">
                            <span class="shape1"></span><span class="shape2"></span>
                            <i class="ti-list sidemenu-icon"></i>
                            <span class="sidemenu-label">Subcategories</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('subsubcategory.all')}}">
                            <span class="shape1"></span><span class="shape2"></span>
                            <i class="ti-list sidemenu-icon"></i>
                            <span class="sidemenu-label">Sub-Subcategories</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product.all')}}">
                            <span class="shape1"></span><span class="shape2"></span>
                            <i class="ti-list sidemenu-icon"></i>
                            <span class="sidemenu-label">Products</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('subscription.all')}}">
                            <span class="shape1"></span><span class="shape2"></span>
                            <i class="ti-agenda sidemenu-icon"></i>
                            <span class="sidemenu-label">Subscriptions</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('subscription.usersubscription')}}">
                            <span class="shape1"></span><span class="shape2"></span>
                            <i class="ti-agenda sidemenu-icon"></i>
                            <span class="sidemenu-label">User Subscription</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('filter.all')}}">
                            <span class="shape1"></span><span class="shape2"></span>
                            <i class="ti-agenda sidemenu-icon"></i>
                            <span class="sidemenu-label">Filters</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- End Sidemenu -->

        <!-- Main Header-->
        <div class="main-header side-header sticky">
            <div class="container-fluid">
                <div class="main-header-left">
                    <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
                </div>
                <div class="main-header-center">
                    <div class="responsive-logo">
                        <a href="index.html"><img src="{{ asset('backend/assets/img/brand/logo.png') }}" class="mobile-logo"
                                alt="logo"></a>
                        <a href="index.html"><img src="{{ asset('backend/assets/img/brand/optical-logo.png') }}" class="mobile-logo-dark"
                                alt="logo"></a>
                    </div>

                </div>
                <div class="main-header-right">
                    <!-- <div class="dropdown header-search">
                        <a class="nav-link icon header-search">
                            <i class="fe fe-search header-icons"></i>
                        </a>
                        <div class="dropdown-menu">
                            <div class="main-form-search p-2">
                                <div class="input-group">
                                    <div class="input-group-btn search-panel">
                                        <select class="form-control select2-no-search">
                                            <option label="All categories">
                                            </option>
                                            <option value="IT Projects">
                                                IT Projects
                                            </option>
                                            <option value="Business Case">
                                                Business Case
                                            </option>
                                            <option value="Microsoft Project">
                                                Microsoft Project
                                            </option>
                                            <option value="Risk Management">
                                                Risk Management
                                            </option>
                                            <option value="Team Building">
                                                Team Building
                                            </option>
                                        </select>
                                    </div>
                                    <input type="search" class="form-control" placeholder="Search for anything...">
                                    <button class="btn search-btn"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="20" height="20" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65">
                                            </line>
                                        </svg></button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="dropdown main-header-notification flag-dropdown">

                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item d-flex ">
                                <span class="avatar  mr-3 align-self-center bg-transparent"><img
                                        src="{{ asset('backend/assets/img/flags/french_flag.jpg') }}" alt="img"></span>
                                <div class="d-flex">
                                    <span class="mt-2">French</span>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex">
                                <span class="avatar  mr-3 align-self-center bg-transparent"><img
                                        src="backend/assets/img/flags/germany_flag.jpg" alt="img"></span>
                                <div class="d-flex">
                                    <span class="mt-2">Germany</span>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex">
                                <span class="avatar mr-3 align-self-center bg-transparent"><img
                                        src="backend/assets/img/flags/italy_flag.jpg" alt="img"></span>
                                <div class="d-flex">
                                    <span class="mt-2">Italy</span>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex">
                                <span class="avatar mr-3 align-self-center bg-transparent"><img
                                        src="backend/assets/img/flags/russia_flag.jpg" alt="img"></span>
                                <div class="d-flex">
                                    <span class="mt-2">Russia</span>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex">
                                <span class="avatar  mr-3 align-self-center bg-transparent"><img
                                        src="backend/assets/img/flags/spain_flag.jpg" alt="img"></span>
                                <div class="d-flex">
                                    <span class="mt-2">spain</span>
                                </div>
                            </a>
                        </div>
                    </div> -->
                    <div class="dropdown d-md-flex">
                        <a class="nav-link icon full-screen-link" href="#">
                            <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                            <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                        </a>
                    </div>
                    <style>
                        .main-profile-menu .dropdown-item {
                            padding-left: 78px !important;
                            padding-right: 78px !important;
                            display: initial !important;
                            padding-bottom: 50px !important;
                        }
                    </style>

                    {{-- @php

                        $user = session()->get('user');
                        $user_name = $user->user_name;
                        $role = $user->role;

                    @endphp --}}



                    <div class="dropdown main-profile-menu">
                        <a class="d-flex" href="#">
                            <span class="main-img-user"><img alt="avatar"
                                    src="{{ asset('backend/assets/img/users/avatar-1.jpg') }}"></span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="header-navheading">
                                {{-- <h6 class="main-notification-title"> {{ $user_name }} </h6> --}}
                            </div>

                            <a class="dropdown-item" href="{{ route('logoutt') }}">
                                <i class="fe fe-power"></i> Sign Out
                            </a>
                            <br><br>
                        </div>
                    </div>

                    <button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
                    </button><!-- Navresponsive closed -->
                </div>
            </div>
        </div>
        <!-- End Main Header-->
