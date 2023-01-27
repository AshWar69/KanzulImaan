@include('includes.library_header')
<div class="page-header border-bottom mb-8">
    <div class="container">
        <div class="d-md-flex justify-content-between align-items-center py-4">
            <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Shop</h1>
            <nav class="woocommerce-breadcrumb font-size-2">
                <a href="{{URL::to('bookslibrary')}}"
                    class="h-primary">Home</a>
                    @yield('tag')
            </nav>
        </div>
    </div>
</div>

@yield('lib_content')

@include('includes.footer')
