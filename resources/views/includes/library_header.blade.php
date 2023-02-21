<!DOCTYPE html>
<html lang="en">

<head>

    <title>KanzulIman | Library</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('front/img/favicon.png') }}">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front/vendor/font-awesome/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/vendor/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/vendor/animate.css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/vendor/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front/vendor/fancybox/jquery.fancybox.css') }}">
    <link rel="stylesheet"
        href="{{ asset('front/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">

    <link rel="stylesheet" href="{{ asset('front/css/theme.css') }}">
    <style>
        .dropdown-menu {
            min-width: fit-content !important;
        }
        .ic{
            margin-right: 50px !important;
            float: right;
        }
        /* .zeynep ul > li.has-submenu > a::after{
            content: "" !important;
        } */
    </style>
</head>

<body>
    <header id="site-header" class="site-header__v1">
        <div class="topbar border-bottom d-none d-md-block">
            <div class="container-fluid px-2 px-md-5 px-xl-8d75">
                <div class="topbar__nav d-md-flex justify-content-between align-items-center">
                    <ul class="topbar__nav--left nav ml-md-n3">
                        <li class="nav-item"><a href="{{ URL::to('ConatctUs') }}" class="nav-link link-black-100"><i
                                    class="glph-icon flaticon-question mr-2"></i>Can we help you?</a></li>
                        <li class="nav-item"><a href="tel:+91{{ $company->mobile }}" class="nav-link link-black-100"><i
                                    class="glph-icon flaticon-phone mr-2"></i>+91-{{ $company->mobile }}</a></li>
                    </ul>
                    <ul class="topbar__nav--right nav mr-md-n3">
                        <li class="nav-item">
                            <a id="sidebarNavToggler" href="javascript:;" role="button" class="nav-link link-black-100"
                                aria-controls="sidebarContent" aria-haspopup="true" aria-expanded="false"
                                data-unfold-event="click" data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarContent" data-unfold-type="css-animation"
                                data-unfold-overlay='{
                                        "className": "u-sidebar-bg-overlay",
                                        "background": "rgba(0, 0, 0, .7)",
                                        "animationSpeed": 500
                                    }'
                                data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                                data-unfold-duration="500">
                                <i class="glph-icon flaticon-user"></i>
                            </a>

                        </li>
                        <li class="nav-item">

                            <a id="sidebarNavToggler1" href="javascript:;" role="button"
                                class="nav-link link-black-100 position-relative" aria-controls="sidebarContent1"
                                aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                                data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent1"
                                data-unfold-type="css-animation"
                                data-unfold-overlay='{
                                        "className": "u-sidebar-bg-overlay",
                                        "background": "rgba(0, 0, 0, .7)",
                                        "animationSpeed": 500
                                    }'
                                data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                                data-unfold-duration="500">
                                <span
                                    class="position-absolute bg-dark width-16 height-16 rounded-circle d-flex align-items-center justify-content-center text-white font-size-n9 right-0">3</span>
                                <i class="glph-icon flaticon-icon-126515"></i>
                            </a>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="masthead border-bottom position-relative" style="margin-bottom: -1px;">
            <div class="container-fluid px-3 px-md-5 px-xl-8d75 py-2 py-md-0">
                <div class="d-flex align-items-center position-relative flex-wrap">
                    <div class="offcanvas-toggler mr-4 mr-lg-8">
                        <a id="sidebarNavToggler2" href="javascript:;" role="button" class="cat-menu"
                            aria-controls="sidebarContent2" aria-haspopup="true" aria-expanded="false"
                            data-unfold-event="click" data-unfold-hide-on-scroll="false"
                            data-unfold-target="#sidebarContent2" data-unfold-type="css-animation"
                            data-unfold-overlay='{
                                "className": "u-sidebar-bg-overlay",
                                "background": "rgba(0, 0, 0, .7)",
                                "animationSpeed": 100
                            }'
                            data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft"
                            data-unfold-duration="100">
                            <svg width="20px" height="18px">
                                <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                    d="M-0.000,-0.000 L20.000,-0.000 L20.000,2.000 L-0.000,2.000 L-0.000,-0.000 Z" />
                                <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                    d="M-0.000,8.000 L15.000,8.000 L15.000,10.000 L-0.000,10.000 L-0.000,8.000 Z" />
                                <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                    d="M-0.000,16.000 L20.000,16.000 L20.000,18.000 L-0.000,18.000 L-0.000,16.000 Z" />
                            </svg>
                        </a>
                    </div>
                    <div class="site-branding pr-md-4">
                        <a href="{{ URL::to('/') }}" class="d-block mb-1">
                            <img class="img-fluid logo-img"
                                src="{{ asset('back/images/company_images/' . $company->image) }}"
                                alt="{{ $company->company_name }}">
                        </a>
                    </div>
                    <div class="site-navigation mr-auto d-none d-xl-block">
                        <ul class="nav">
                            <li class="nav-item"><a href="{{ URL::to('Kanzuliman/Bookslibrary') }}"
                                    class="nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="homeDropdownInvoker" href="#"
                                    class="dropdown-toggle nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium d-flex align-items-center"
                                    aria-haspopup="true" aria-expanded="false" data-unfold-event="hover"
                                    data-unfold-target="#homeDropdownMenu" data-unfold-type="css-animation"
                                    data-unfold-duration="200" data-unfold-delay="50"
                                    data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp"
                                    data-unfold-animation-out="fadeOut">
                                    Categories
                                </a>
                                <ul id="homeDropdownMenu"
                                    class="dropdown-unfold dropdown-menu font-size-2 rounded-0 border-gray-900"
                                    aria-labelledby="homeDropdownInvoker">
                                    @php $i=1; @endphp
                                    @foreach ($categories as $cat)
                                        @if ($cat->childrenRecursive->isEmpty())
                                            <li><a href="{{URL::to('books/category='.$cat->id)}}"
                                                    class="dropdown-item link-black-100">{{ $cat->category_name }}</a>
                                            </li>
                                        @elseif($cat->childrenRecursive)
                                            <li class="position-relative">
                                                <a id="shopDropdownsubmenuoneInvoker" href="{{URL::to('books/category='.$cat->id)}}"
                                                    class="dropdown-toggle dropdown-item dropdown-item__sub-menu link-black-100 d-flex align-items-center justify-content-between"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-unfold-event="hover"
                                                    data-unfold-target="#shopDropdownsubMenu{{ $i }}"
                                                    data-unfold-type="css-animation" data-unfold-duration="200"
                                                    data-unfold-delay="100" data-unfold-hide-on-scroll="true"
                                                    data-unfold-animation-in="slideInUp"
                                                    data-unfold-animation-out="fadeOut">{{ $cat->category_name }}
                                                </a>
                                                <ul id="shopDropdownsubMenu{{ $i }}"
                                                    class="dropdown-unfold dropdown-menu dropdown-sub-menu font-size-2 rounded-0 border-gray-900"
                                                    aria-labelledby="shopDropdownsubmenuoneInvoker">
                                                    @php $level=1; @endphp
                                                    @foreach ($cat->childrenRecursive as $childs)
                                                        @include('includes.lib_cat', [
                                                            'childs' => $childs,
                                                            'level' => $level,
                                                        ])
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                        @php $i++; @endphp
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <ul class="d-md-none nav mr-md-n3 ml-auto">
                        <li class="nav-item">

                            <a id="sidebarNavToggler9" href="javascript:;" role="button"
                                class="px-2 nav-link link-black-100" aria-controls="sidebarContent9"
                                aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                                data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent9"
                                data-unfold-type="css-animation"
                                data-unfold-overlay='{
                                        "className": "u-sidebar-bg-overlay",
                                        "background": "rgba(0, 0, 0, .7)",
                                        "animationSpeed": 500
                                    }'
                                data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                                data-unfold-duration="500">
                                <i class="glph-icon flaticon-user"></i>
                            </a>

                        </li>
                    </ul>
                    <div class="site-search ml-xl-0 ml-md-auto w-r-100 my-2 my-xl-0">
                        <form class="form-inline" action="{{route('book.search')}}" method="GET">
                            <div class="input-group" id="the-basics">
                                <div class="input-group-prepend">
                                    <i
                                        class="glph-icon flaticon-loupe input-group-text py-2d75 bg-white-100 border-white-100"></i>
                                </div>
                                <input
                                    class="typeahead form-control bg-white-100 min-width-380 py-2d75 height-4 border-white-100"
                                    type="search" placeholder="Search for Books by Name ..." aria-label="Search" name="qsearch">
                            </div>
                            {{-- <button class="btn btn-outline-success my-2 my-sm-0 sr-only"
                                type="submit">Search</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <aside id="sidebarContent9" class="u-sidebar u-sidebar__lg" aria-labelledby="sidebarNavToggler9">
        <div class="u-sidebar__scroller">
            <div class="u-sidebar__container">
                <div class="u-header-sidebar__footer-offset">

                    <div class="d-flex align-items-center position-absolute top-0 right-0 z-index-2 mt-5 mr-md-6 mr-4">
                        <button type="button" class="close ml-auto" aria-controls="sidebarContent9"
                            aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                            data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent9"
                            data-unfold-type="css-animation" data-unfold-animation-in="fadeInRight"
                            data-unfold-animation-out="fadeOutRight" data-unfold-duration="500">
                            <span aria-hidden="true">Close <i class="fas fa-times ml-2"></i></span>
                        </button>
                    </div>


                    <div class="js-scrollbar u-sidebar__body">
                        <div class="u-sidebar__content u-header-sidebar__content">
                            <form class="">

                                <div id="login1" data-target-group="idForm1">

                                    <header class="border-bottom px-4 px-md-6 py-4">
                                        <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                                                class="flaticon-user mr-3 font-size-5"></i>Account</h2>
                                    </header>

                                    <div class="p-4 p-md-6">

                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinEmailLabel9" class="form-label"
                                                    for="signinEmail9">Username or email *</label>
                                                <input type="email" class="form-control rounded-0 height-4 px-4"
                                                    name="email" id="signinEmail9"
                                                    placeholder="creativelayers088@gmail.com"
                                                    aria-label="creativelayers088@gmail.com"
                                                    aria-describedby="signinEmailLabel9" required>
                                            </div>
                                        </div>


                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinPasswordLabel9" class="form-label"
                                                    for="signinPassword9">Password *</label>
                                                <input type="password" class="form-control rounded-0 height-4 px-4"
                                                    name="password" id="signinPassword9" placeholder=""
                                                    aria-label="" aria-describedby="signinPasswordLabel9" required>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between mb-5 align-items-center">

                                            <div class="js-form-message">
                                                <div
                                                    class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="termsCheckbox1" name="termsCheckbox1" required>
                                                    <label class="custom-control-label" for="termsCheckbox1">
                                                        <span class="font-size-2 text-secondary-gray-700">
                                                            Remember me
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                            <a class="js-animation-link text-dark font-size-2 t-d-u link-muted font-weight-medium"
                                                href="javascript:;" data-target="#forgotPassword1"
                                                data-link-group="idForm1" data-animation-in="fadeIn">Forgot
                                                Password?</a>
                                        </div>
                                        <div class="mb-4d75">
                                            <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark">Sign
                                                In</button>
                                        </div>
                                        <div class="mb-2">
                                            <a href="javascript:;"
                                                class="js-animation-link btn btn-block py-3 rounded-0 btn-outline-dark font-weight-medium"
                                                data-target="#signup1" data-link-group="idForm1"
                                                data-animation-in="fadeIn">Create Account</a>
                                        </div>
                                    </div>
                                </div>

                                <div id="signup1" style="display: none; opacity: 0;" data-target-group="idForm1">

                                    <header class="border-bottom px-4 px-md-6 py-4">
                                        <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                                                class="flaticon-resume mr-3 font-size-5"></i>Create Account</h2>
                                    </header>

                                    <div class="p-4 p-md-6">

                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinEmailLabel11" class="form-label"
                                                    for="signinEmail11">Email *</label>
                                                <input type="email" class="form-control rounded-0 height-4 px-4"
                                                    name="email" id="signinEmail11"
                                                    placeholder="creativelayers088@gmail.com"
                                                    aria-label="creativelayers088@gmail.com"
                                                    aria-describedby="signinEmailLabel11" required>
                                            </div>
                                        </div>


                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinPasswordLabel11" class="form-label"
                                                    for="signinPassword11">Password *</label>
                                                <input type="password" class="form-control rounded-0 height-4 px-4"
                                                    name="password" id="signinPassword11" placeholder=""
                                                    aria-label="" aria-describedby="signinPasswordLabel11" required>
                                            </div>
                                        </div>


                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signupConfirmPasswordLabel9" class="form-label"
                                                    for="signupConfirmPassword9">Confirm Password *</label>
                                                <input type="password" class="form-control rounded-0 height-4 px-4"
                                                    name="confirmPassword" id="signupConfirmPassword9" placeholder=""
                                                    aria-label="" aria-describedby="signupConfirmPasswordLabel9"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit"
                                                class="btn btn-block py-3 rounded-0 btn-dark">Create Account</button>
                                        </div>
                                        <div class="text-center mb-4">
                                            <span class="small text-muted">Already have an account?</span>
                                            <a class="js-animation-link small" href="javascript:;"
                                                data-target="#login1" data-link-group="idForm1"
                                                data-animation-in="fadeIn">Login
                                            </a>
                                        </div>
                                    </div>
                                </div>


                                <div id="forgotPassword1" style="display: none; opacity: 0;"
                                    data-target-group="idForm1">

                                    <header class="border-bottom px-4 px-md-6 py-4">
                                        <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                                                class="flaticon-question mr-3 font-size-5"></i>Forgot Password?</h2>
                                    </header>

                                    <div class="p-4 p-md-6">

                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinEmailLabel33" class="form-label"
                                                    for="signinEmail33">Email *</label>
                                                <input type="email" class="form-control rounded-0 height-4 px-4"
                                                    name="email" id="signinEmail33"
                                                    placeholder="creativelayers088@gmail.com"
                                                    aria-label="creativelayers088@gmail.com"
                                                    aria-describedby="signinEmailLabel33" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit"
                                                class="btn btn-block py-3 rounded-0 btn-dark">Recover Password</button>
                                        </div>
                                        <div class="text-center mb-4">
                                            <span class="small text-muted">Remember your password?</span>
                                            <a class="js-animation-link small" href="javascript:;"
                                                data-target="#login1" data-link-group="idForm1"
                                                data-animation-in="fadeIn">Login
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </aside>

    <aside id="sidebarContent" class="u-sidebar u-sidebar__lg" aria-labelledby="sidebarNavToggler">
        <div class="u-sidebar__scroller">
            <div class="u-sidebar__container">
                <div class="u-header-sidebar__footer-offset">

                    <div class="d-flex align-items-center position-absolute top-0 right-0 z-index-2 mt-5 mr-md-6 mr-4">
                        <button type="button" class="close ml-auto" aria-controls="sidebarContent"
                            aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                            data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent"
                            data-unfold-type="css-animation" data-unfold-animation-in="fadeInRight"
                            data-unfold-animation-out="fadeOutRight" data-unfold-duration="500">
                            <span aria-hidden="true">Close <i class="fas fa-times ml-2"></i></span>
                        </button>
                    </div>


                    <div class="js-scrollbar u-sidebar__body">
                        <div class="u-sidebar__content u-header-sidebar__content">
                            <form class="">

                                <div id="login" data-target-group="idForm">

                                    <header class="border-bottom px-4 px-md-6 py-4">
                                        <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                                                class="flaticon-user mr-3 font-size-5"></i>Account</h2>
                                    </header>

                                    <div class="p-4 p-md-6">

                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinEmailLabel" class="form-label"
                                                    for="signinEmail">Username or email *</label>
                                                <input type="email" class="form-control rounded-0 height-4 px-4"
                                                    name="email" id="signinEmail"
                                                    placeholder="creativelayers088@gmail.com"
                                                    aria-label="creativelayers088@gmail.com"
                                                    aria-describedby="signinEmailLabel" required>
                                            </div>
                                        </div>


                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinPasswordLabel" class="form-label"
                                                    for="signinPassword">Password *</label>
                                                <input type="password" class="form-control rounded-0 height-4 px-4"
                                                    name="password" id="signinPassword" placeholder=""
                                                    aria-label="" aria-describedby="signinPasswordLabel" required>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between mb-5 align-items-center">

                                            <div class="js-form-message">
                                                <div
                                                    class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="termsCheckbox" name="termsCheckbox" required>
                                                    <label class="custom-control-label" for="termsCheckbox">
                                                        <span class="font-size-2 text-secondary-gray-700">
                                                            Remember me
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                            <a class="js-animation-link text-dark font-size-2 t-d-u link-muted font-weight-medium"
                                                href="javascript:;" data-target="#forgotPassword"
                                                data-link-group="idForm" data-animation-in="fadeIn">Forgot
                                                Password?</a>
                                        </div>
                                        <div class="mb-4d75">
                                            <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark">Sign
                                                In</button>
                                        </div>
                                        <div class="mb-2">
                                            <a href="javascript:;"
                                                class="js-animation-link btn btn-block py-3 rounded-0 btn-outline-dark font-weight-medium"
                                                data-target="#signup" data-link-group="idForm"
                                                data-animation-in="fadeIn">Create Account</a>
                                        </div>
                                    </div>
                                </div>

                                <div id="signup" style="display: none; opacity: 0;" data-target-group="idForm">

                                    <header class="border-bottom px-4 px-md-6 py-4">
                                        <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                                                class="flaticon-resume mr-3 font-size-5"></i>Create Account</h2>
                                    </header>

                                    <div class="p-4 p-md-6">

                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinEmailLabel1" class="form-label"
                                                    for="signinEmail1">Email *</label>
                                                <input type="email" class="form-control rounded-0 height-4 px-4"
                                                    name="email" id="signinEmail1"
                                                    placeholder="creativelayers088@gmail.com"
                                                    aria-label="creativelayers088@gmail.com"
                                                    aria-describedby="signinEmailLabel1" required>
                                            </div>
                                        </div>


                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinPasswordLabel1" class="form-label"
                                                    for="signinPassword1">Password *</label>
                                                <input type="password" class="form-control rounded-0 height-4 px-4"
                                                    name="password" id="signinPassword1" placeholder=""
                                                    aria-label="" aria-describedby="signinPasswordLabel1" required>
                                            </div>
                                        </div>


                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signupConfirmPasswordLabel" class="form-label"
                                                    for="signupConfirmPassword">Confirm Password *</label>
                                                <input type="password" class="form-control rounded-0 height-4 px-4"
                                                    name="confirmPassword" id="signupConfirmPassword" placeholder=""
                                                    aria-label="" aria-describedby="signupConfirmPasswordLabel"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit"
                                                class="btn btn-block py-3 rounded-0 btn-dark">Create Account</button>
                                        </div>
                                        <div class="text-center mb-4">
                                            <span class="small text-muted">Already have an account?</span>
                                            <a class="js-animation-link small" href="javascript:;"
                                                data-target="#login" data-link-group="idForm"
                                                data-animation-in="fadeIn">Login
                                            </a>
                                        </div>
                                    </div>
                                </div>


                                <div id="forgotPassword" style="display: none; opacity: 0;"
                                    data-target-group="idForm">

                                    <header class="border-bottom px-4 px-md-6 py-4">
                                        <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                                                class="flaticon-question mr-3 font-size-5"></i>Forgot Password?</h2>
                                    </header>

                                    <div class="p-4 p-md-6">

                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinEmailLabel3" class="form-label"
                                                    for="signinEmail3">Email *</label>
                                                <input type="email" class="form-control rounded-0 height-4 px-4"
                                                    name="email" id="signinEmail3"
                                                    placeholder="creativelayers088@gmail.com"
                                                    aria-label="creativelayers088@gmail.com"
                                                    aria-describedby="signinEmailLabel3" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit"
                                                class="btn btn-block py-3 rounded-0 btn-dark">Recover Password</button>
                                        </div>
                                        <div class="text-center mb-4">
                                            <span class="small text-muted">Remember your password?</span>
                                            <a class="js-animation-link small" href="javascript:;"
                                                data-target="#login" data-link-group="idForm"
                                                data-animation-in="fadeIn">Login
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </aside>

    <aside id="sidebarContent1" class="u-sidebar u-sidebar__xl" aria-labelledby="sidebarNavToggler1">
        <div class="u-sidebar__scroller js-scrollbar">
            <div class="u-sidebar__container">
                <div class="u-header-sidebar__footer-offset">

                    <div class="d-flex align-items-center position-absolute top-0 right-0 z-index-2 mt-5 mr-md-6 mr-4">
                        <button type="button" class="close ml-auto" aria-controls="sidebarContent1"
                            aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                            data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent1"
                            data-unfold-type="css-animation" data-unfold-animation-in="fadeInRight"
                            data-unfold-animation-out="fadeOutRight" data-unfold-duration="500">
                            <span aria-hidden="true">Close <i class="fas fa-times ml-2"></i></span>
                        </button>
                    </div>


                    <div class="u-sidebar__body">
                        <div class="u-sidebar__content u-header-sidebar__content">

                            <header class="border-bottom px-4 px-md-6 py-4">
                                <h2 class="font-size-3 mb-0 d-flex align-items-center"><i
                                        class="flaticon-icon-126515 mr-3 font-size-5"></i>Your shopping bag (3)</h2>
                            </header>

                            <div class="px-4 py-5 px-md-6 border-bottom">
                                <div class="media">
                                    <a href="#" class="d-block"><img src="../../assets/img/120x180/img6.jpg"
                                            class="img-fluid" alt="image-description"></a>
                                    <div class="media-body ml-4d875">
                                        <div class="text-primary text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="#">Hard Cover</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title h6 text-lh-md mb-1 text-height-2 crop-text-2">
                                            <a href="#" class="text-dark">The Ride of a Lifetime: Lessons
                                                Learned from 15 Years as CEO</a>
                                        </h2>
                                        <div class="font-size-2 mb-1 text-truncate"><a href="#"
                                                class="text-gray-700">Robert Iger</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount">1 x <span
                                                    class="woocommerce-Price-currencySymbol">$</span>125.30</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 ml-3">
                                        <a href="#" class="text-dark"><i class="fas fa-times"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-5 px-md-6 border-bottom">
                                <div class="media">
                                    <a href="#" class="d-block"><img src="../../assets/img/120x180/img6.jpg"
                                            class="img-fluid" alt="image-description"></a>
                                    <div class="media-body ml-4d875">
                                        <div class="text-primary text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="#">Hard Cover</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title h6 text-lh-md mb-1 text-height-2 crop-text-2">
                                            <a href="#" class="text-dark">The Rural Diaries: Love, Livestock,
                                                and Big Life Lessons Down</a>
                                        </h2>
                                        <div class="font-size-2 mb-1 text-truncate"><a href="#"
                                                class="text-gray-700">Hillary Burton</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount">2 x <span
                                                    class="woocommerce-Price-currencySymbol">$</span>200</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 ml-3">
                                        <a href="#" class="text-dark"><i class="fas fa-times"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-5 px-md-6 border-bottom">
                                <div class="media">
                                    <a href="#" class="d-block"><img src="../../assets/img/120x180/img6.jpg"
                                            class="img-fluid" alt="image-description"></a>
                                    <div class="media-body ml-4d875">
                                        <div class="text-primary text-uppercase font-size-1 mb-1 text-truncate"><a
                                                href="#">Paperback</a></div>
                                        <h2
                                            class="woocommerce-loop-product__title h6 text-lh-md mb-1 text-height-2 crop-text-2">
                                            <a href="#" class="text-dark">Russians Among Us: Sleeper Cells,
                                                Ghost Stories, and the Hunt.</a>
                                        </h2>
                                        <div class="font-size-2 mb-1 text-truncate"><a href="#"
                                                class="text-gray-700">Gordon Corera</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount">6 x <span
                                                    class="woocommerce-Price-currencySymbol">$</span>100</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 ml-3">
                                        <a href="#" class="text-dark"><i class="fas fa-times"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="px-4 py-5 px-md-6 d-flex justify-content-between align-items-center font-size-3">
                                <h4 class="mb-0 font-size-3">Subtotal:</h4>
                                <div class="font-weight-medium">$750.00</div>
                            </div>
                            <div class="px-4 mb-8 px-md-6">
                                <a href="cart.html" class="btn btn-block py-4 rounded-0 btn-outline-dark mb-4">View
                                    Cart</a>
                                <a href="checkout.html" class="btn btn-block py-4 rounded-0 btn-dark">Checkout</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </aside>

    <aside id="sidebarContent2" class="u-sidebar u-sidebar__md u-sidebar--left" aria-labelledby="sidebarNavToggler2">
        <div class="u-sidebar__scroller js-scrollbar">
            <div class="u-sidebar__container">
                <div class="u-header-sidebar__footer-offset">

                    <div class="u-sidebar__body">
                        <div class="u-sidebar__content u-header-sidebar__content">

                            <header
                                class="border-bottom px-4 px-md-5 py-4 d-flex align-items-center justify-content-between">
                                <h2 class="font-size-3 mb-0">BOOKS BY CATEGORY</h2>

                                <div class="d-flex align-items-center">
                                    <button type="button" class="close ml-auto" aria-controls="sidebarContent2"
                                        aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                                        data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent2"
                                        data-unfold-type="css-animation" data-unfold-animation-in="fadeInLeft"
                                        data-unfold-animation-out="fadeOutLeft" data-unfold-duration="500">
                                        <span aria-hidden="true"><i class="fas fa-times ml-2"></i></span>
                                    </button>
                                </div>

                            </header>

                            <div class="border-bottom">
                                <div class="zeynep pt-4">
                                    <ul>
                                        @php $id=1; $slevel=1; @endphp
                                        @foreach ($categories as $cat)
                                            @if ($cat->childrenRecursive->isEmpty())
                                                <li><a href="{{URL::to('books/category='.$cat->id)}}" class="py-3">{{ $cat->category_name }}</a></li>
                                            @elseif($cat->childrenRecursive)
                                                <li class="has-submenu py-3">
                                                    <a class="catLink" href="{{URL::to('books/category='.$cat->id)}}">{{ $cat->category_name }}</a> <span class="ic text-dark" data-submenu="off-pages{{$id}}"><i class="fa fa-angle-right"></i></span>
                                                    <div id="off-pages{{$id}}" class="submenu">
                                                        <div class="submenu-header" data-submenu-close="off-pages{{$id}}">
                                                            <a href="#">{{ $cat->category_name }}</a>
                                                        </div>
                                                        <ul>
                                                                @foreach ($cat->childrenRecursive as $child)
                                                                    @include('includes.menu', [
                                                                        'childs' => $child, 'slevel'=>$slevel, 'id'=>$id
                                                                    ])
                                                                    @php $slevel++; @endphp
                                                                @endforeach
                                                        </ul>
                                                    </div>
                                                </li>
                                                @php $id++; @endphp
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="px-4 px-md-5 pt-5 pb-4 border-bottom">
                                <h2 class="font-size-3 mb-3">HELP & SETTINGS </h2>
                                <ul class="list-group list-group-flush list-group-borderless">
                                    <li class="list-group-item px-0 py-2 border-0"><a href="#"
                                            class="h-primary">Your Account</a></li>
                                    <li class="list-group-item px-0 py-2 border-0"><a href="#"
                                            class="h-primary">Help</a></li>
                                    <li class="list-group-item px-0 py-2 border-0"><a href="#"
                                            class="h-primary">Sign In</a></li>
                                </ul>
                            </div>
                            <div class="px-4 px-md-5 py-5">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <a class="h-primary pr-2 font-size-2" href="#">
                                            <span class="fab fa-facebook-f btn-icon__inner"></span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="h-primary pr-2 font-size-2" href="#">
                                            <span class="fab fa-google btn-icon__inner"></span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="h-primary pr-2 font-size-2" href="#">
                                            <span class="fab fa-twitter btn-icon__inner"></span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="h-primary pr-2 font-size-2" href="#">
                                            <span class="fab fa-github btn-icon__inner"></span>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </aside>
