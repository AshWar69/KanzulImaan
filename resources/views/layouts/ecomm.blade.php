@include('includes.ecomm_header')
<div class="page-header border-bottom">
    <div class="container">
        <div class="d-md-flex justify-content-between align-items-center py-4">
            <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Shop</h1>
            <nav class="woocommerce-breadcrumb font-size-2">
                {{-- <a href="{{URL::to('/')}}"
                    class="h-primary">Home</a>
                <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span> --}}
                <a href="{{URL::to('QuranStore')}}" class="h-primary">Shop</a>
                @yield('tag')
            </nav>
        </div>
    </div>
</div>

@yield('ecomm_content')

@include('includes.footer')
