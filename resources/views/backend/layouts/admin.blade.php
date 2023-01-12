@include('backend.includes.header')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>
</main>
@include('backend.includes.footer')
