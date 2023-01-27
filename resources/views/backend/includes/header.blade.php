<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('back/favicon.ico') }}">
    <title>Kanzuliman Dashboard </title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('back/css/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('back/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('back/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('back/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('back/css/uppy.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/css/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('back/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('back/css/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('back/css/dataTables.bootstrap4.css') }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('back/css/daterangepicker.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('back/css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('back/css/app-dark.css') }}" id="darkTheme" disabled>
    <link rel="stylesheet" type="text/css" href="{{ asset('back/css/sweetalert2.css') }}">
</head>

<body class="vertical  light  ">
    <div class="wrapper">
        <nav class="topnav navbar navbar-light">
            <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
                <i class="fe fe-menu navbar-toggler-icon"></i>
            </button>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                        <i class="fe fe-sun fe-16"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="avatar avatar-sm mt-2">
                            <img src="{{asset('back/images/admin.jpg')}}" alt="..." class="avatar-img rounded-circle">
                        </span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
            <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3"
                data-toggle="toggle">
                <i class="fe fe-x"><span class="sr-only"></span></i>
            </a>
            <nav class="vertnav navbar navbar-light">
                <!-- nav bar -->
                <div class="w-100 mb-4 d-flex">
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ URL::to('admin/Dashboard') }}">
                        <svg version="1.1" id="logo" class="navbar-brand-img brand-sm"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                            <g>
                                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                            </g>
                        </svg>
                    </a>
                </div>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{ URL::to('admin/Dashboard') }}">
                            <i class="fe fe-home fe-16"></i>
                            <span class="ml-3 item-text">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Ecommerce Section</span>
                </p>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{ URL::to('admin/ProductsShowcase') }}">
                            <i class="fe fe-shopping-bag fe-16"></i>
                            <span class="ml-3 item-text">Products</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{ URL::to('admin/ShowOrders') }}">
                            <i class="fe fe-shopping-cart fe-16"></i>
                            <span class="ml-3 item-text">Orders</span>
                        </a>
                    </li>
                </ul>
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Library Section</span>
                </p>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{ URL::to('admin/ShowCategories') }}">
                            <i class="fe fe-layers fe-16"></i>
                            <span class="ml-3 item-text">Categories</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{ URL::to('admin/LibraryShowcase') }}">
                            <i class="fe fe-book fe-16"></i>
                            <span class="ml-3 item-text">Library Showcase</span>
                        </a>
                    </li>
                </ul>
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Home Section</span>
                </p>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{URL::to('admin/ManageBanner')}}">
                            <i class="fe fe-image fe-16"></i>
                            <span class="ml-3 item-text">Manage Banners</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{URL::to('admin/ManageOrganisation')}}">
                            <i class="fe fe-home fe-16"></i>
                            <span class="ml-3 item-text">Manage Organisation</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{URL::to('admin/ManageSocialPlatform')}}">
                            <i class="fe fe-link fe-16"></i>
                            <span class="ml-3 item-text">Manage Social Platform</span>
                        </a>
                    </li>
                </ul>
                {{-- <div class="btn-box w-100 mt-4 mb-1">
                    <a href="https://themeforest.net/item/tinydash-bootstrap-html-admin-dashboard-template/27511269"
                        target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
                        <i class="fe fe-shopping-cart fe-12 mx-2"></i><span class="small">Buy now</span>
                    </a>
                </div> --}}
            </nav>
        </aside>
