@extends('layouts.ecomm')
@section('ecomm_content')

@section('tag')
    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>{{ $product->product_name }}
@endsection

<div id="primary" class="content-area">
    <main id="main" class="site-main ">
        <div class="product">
            <div class="container mb-6">
                <div class="row">
                    <div class="col-12">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @elseif (Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                    </div>
                    <div
                        class="col-md-4 col-lg-3 woocommerce-product-gallery woocommerce-product-gallery--with-images images">
                        <figure class="woocommerce-product-gallery__wrapper pt-8 mb-0">
                            <div class="js-slick-carousel u-slick"
                                data-pagi-classes="text-center u-slick__pagination my-4">
                                @foreach ($images as $data)
                                    <div class="js-slide">
                                        <img src="{{ asset('back/images/product_images/' . $data->image) }}"
                                            alt="{{ $product->slug }}" class="mx-auto img-fluid">
                                    </div>
                                @endforeach
                            </div>
                        </figure>
                    </div>

                    <div class="col-md-8 col-lg-5 pl-0 summary entry-summary">
                        <div class="space-top-2 pl-4 pl-wd-6 px-wd-7 pb-5">
                            <h1 class="product_title entry-title font-size-7 mb-3">{{ $product->product_name }}</h1>
                            <div class="font-size-2 mb-4">
                                {{-- <span class="text-yellow-darker">
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                </span>
                                <span class="ml-3">(3,714)</span> --}}
                                <span class="ml-3 font-weight-medium">Written By {{$product->author}}</span>
                                <span class="ml-3 font-weight-medium">Published By {{$product->publication}}</span>
                            </div>
                            <div class="woocommerce-product-details__short-description font-size-2 mb-5">
                                <p class="">{{ $product->description }}.</p>
                            </div>
                            <ul class="list-unstyled my-0 list-features d-xl-flex align-items-center">
                                <li class="list-feature mb-6 mb-xl-0 mr-xl-4 mr-wd-6">
                                    <div class="media">
                                        <div class="feature__icon font-size-46 text-primary text-lh-xs">
                                            <i class="glyph-icon flaticon-delivery"></i>
                                        </div>
                                        <div class="media-body ml-4">
                                            <h6 class="feature__title">Safe Delivery</h6>
                                            <p class="feature__subtitle m-0">100% Secure Delivery</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-feature mb-6 mb-xl-0">
                                    <div class="media">
                                        <div class="feature__icon font-size-46 text-primary text-lh-xs">
                                            <i class="glyph-icon flaticon-credit"></i>
                                        </div>
                                        <div class="media-body ml-4">
                                            <h6 class="feature__title">Secure Payment</h6>
                                            <p class="feature__subtitle m-0">100% Secure Payment</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="border mt-md-8">
                            <div class="bg-white-100 py-4 px-5">
                                <p class="price font-size-22 font-weight-medium mb-0">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">₹</span>{{ $product->price }}
                                    </span>
                                </p>
                            </div>
                            <div class="py-4 px-5">
                                <form class="cart mb-4" method="post" action="{{ route('addtocart') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="pid" value="{{ $product->id }}">
                                    <input type="hidden" name="user_id" value="@if(Auth::check()) {{ Auth::user()->id }} @else 0 @endif">
                                    <label class="form-label font-size-2 font-weight-medium">Quantity</label>
                                    <div class="quantity mb-4 d-flex align-items-center">
                                        <div class="border px-3 w-100">
                                            <div class="js-quantity">
                                                <div class="d-flex align-items-center">
                                                    <label class="screen-reader-text sr-only">Quantity</label>
                                                    <a class="js-minus text-dark" href="javascript:;">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="10px"
                                                            height="1px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                                                d="M-0.000,-0.000 L10.000,-0.000 L10.000,1.000 L-0.000,1.000 L-0.000,-0.000 Z" />
                                                        </svg>
                                                    </a>
                                                    <input type="number"
                                                        class="input-text qty text js-result form-control text-center border-0"
                                                        step="1" min="1" max="100" name="quantity"
                                                        value="1" title="Qty">
                                                    <a class="js-plus text-dark" href="javascript:;">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="10px"
                                                            height="10px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                                                d="M10.000,5.000 L6.000,5.000 L6.000,10.000 L5.000,10.000 L5.000,5.000 L-0.000,5.000 L-0.000,4.000 L5.000,4.000 L5.000,-0.000 L6.000,-0.000 L6.000,4.000 L10.000,4.000 L10.000,5.000 Z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" name="add-to-cart"
                                                class="btn btn-block btn-dark border-0 rounded-0 p-3 single_add_to_cart_button button alt">Add
                                                to cart
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" name="buy now" id="buyNow"
                                                class="btn btn-block btn-dark border-0 rounded-0 p-3 single_add_to_cart_button button alt">Buy
                                                Now
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                {{-- <ul class="list-unstyled nav d-block d-md-flex justify-content-center">
                                    <li class="mr-md-4 mb-4 mb-md-0">
                                        <a href="#" class="h-primary"><i class="flaticon-heart mr-2"></i> Add to
                                            Wishlist</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="h-primary"><i class="flaticon-share mr-2"></i> Share</a>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="woocommerce-tabs wc-tabs-wrapper mb-10">

                <ul class="tabs wc-tabs nav border-bottom justify-content-md-center flex-nowrap flex-md-wrap overflow-auto overflow-md-visble"
                    id="pills-tab" role="tablist">
                    <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                        <a class="py-4 nav-link font-weight-medium active" id="pills-one-example1-tab"
                            data-toggle="pill" href="#pills-one-example1" role="tab"
                            aria-controls="pills-one-example1" aria-selected="true">
                            Description
                        </a>
                    </li>
                    <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                        <a class="py-4 nav-link font-weight-medium" id="pills-two-example1-tab" data-toggle="pill"
                            href="#pills-two-example1" role="tab" aria-controls="pills-two-example1"
                            aria-selected="false">
                            Product Details
                        </a>
                    </li>
                    {{-- <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                        <a class="py-4 nav-link font-weight-medium" id="pills-three-example1-tab" data-toggle="pill"
                            href="#pills-three-example1" role="tab" aria-controls="pills-three-example1"
                            aria-selected="false">
                            Videos
                        </a>
                    </li>
                    <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                        <a class="py-4 nav-link font-weight-medium" id="pills-four-example1-tab" data-toggle="pill"
                            href="#pills-four-example1" role="tab" aria-controls="pills-four-example1"
                            aria-selected="false">
                            Reviews (0)
                        </a>
                    </li> --}}
                </ul>


                <div class="tab-content container" id="pills-tabContent">
                    <div class="woocommerce-Tabs-panel panel col-xl-8 offset-xl-2 entry-content wc-tab tab-pane fade pt-9 show active"
                        id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab">

                        <p class="mb-0">{{ $product->description }}</p>
                    </div>
                    <div class="woocommerce-Tabs-panel panel col-xl-8 offset-xl-2 entry-content wc-tab tab-pane fade pt-9"
                        id="pills-two-example1" role="tabpanel" aria-labelledby="pills-two-example1-tab">

                        <div class="table-responsive mb-4">
                            <table class="table table-hover table-borderless">
                                <tbody>
                                    <tr>
                                        <th class="px-4 px-xl-5">Format: </th>
                                        <td class="">{{ $product->format }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Language:</th>
                                        <td>{{ $product->language }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Pages:</th>
                                        <td>{{ $product->pages }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Size:</th>
                                        <td>{{ $product->size }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Author:</th>
                                        <td>{{ $product->author }}</td>
                                    </tr>
                                    <tr>
                                        <th class="px-4 px-xl-5">Publication:</th>
                                        <td>{{ $product->publication }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <section class="space-bottom-3">
                <div class="container">
                    <header class="mb-5 d-md-flex justify-content-between align-items-center">
                        <h2 class="font-size-7 mb-3 mb-md-0">Related Books</h2>
                    </header>
                    <div class="js-slick-carousel products no-gutters border-top border-left border-right"
                        data-arrows-classes="u-slick__arrow u-slick__arrow-centered--y"
                        data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10"
                        data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10"
                        data-slides-show="5"
                        data-responsive='[{
                           "breakpoint": 1500,
                           "settings": {
                             "slidesToShow": 4
                           }
                        },{
                           "breakpoint": 1199,
                           "settings": {
                             "slidesToShow": 3
                           }
                        }, {
                           "breakpoint": 992,
                           "settings": {
                             "slidesToShow": 2
                           }
                        }, {
                           "breakpoint": 554,
                           "settings": {
                             "slidesToShow": 2
                           }
                        }]'>
                        @foreach ($related_products as $products)
                            <div class="product">
                                <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            @if (isset($pimage[$products->id]))
                                                <a href="{{ URL::to('Product/' . $product->slug) }}"
                                                    class="d-block"><img  style="width: 485px; height: 200px;"
                                                        src="{{ asset('back/images/product_images/' . $pimage[$products->id]) }}"
                                                        class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                        alt="{{$product->slug}}"></a>
                                            @endif
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                    href="{{ URL::to('Product/' . $products->slug) }}">{{ $products->language }}</a>
                                            </div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a
                                                    href="{{ URL::to('Product/' . $products->slug) }}">{{ $products->product_name }}</a>
                                            </h2>
                                            <div
                                                class="price d-flex align-items-center font-weight-medium font-size-3">
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">₹</span>{{ $products->price }}</span>
                                            </div>
                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            <a href="{{ URL::to('Product/' . $products->slug) }}"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="flaticon-icon-126515"></i></span>
                                            </a>
                                            {{-- <a href="single-product-v1.html"
                                            class="mr-1 h-p-bg btn btn-outline-primary border-0">
                                            <i class="flaticon-switch"></i>
                                        </a>
                                        <a href="single-product-v1.html"
                                            class="h-p-bg btn btn-outline-primary border-0">
                                            <i class="flaticon-heart"></i>
                                        </a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </main>
</div>
@endsection
@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $("#buyNow").click(function(e) {
        e.preventDefault();
        var pid = $("input[name='pid']").val();
        var uid = $("input[name='user_id']").val();
        var quan = $("input[name='quantity']").val();
        if(uid == 0)
            self.location="{{URL::to('login')}}";
        else{
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "{{ route('AddCart') }}",
            data: {
                "pid": pid,
                "user_id": uid,
                "quantity": quan,
            },
            success: function(response) {
                if (response.type == 'success') {
                    self.location = "{{ URL::to('Kanzuliman/Checkout') }}";
                } else if (response.type == 'error') {
                    Swal.fire({
                        title: response.type,
                        text: response.message,
                        icon: response.type,
                        confirmButtonText: 'Done'
                    });
                    self.location = "{{ URL::to('Kanzuliman/Checkout') }}";
                }
            }
        });
        }
    });

    $(document).ready(function() {
        if ($(window).width() < 768) {
            $('.woocommerce-product-gallery--with-images').addClass('border-bottom');
        }

        if ($(window).width() > 768) {
            $('.woocommerce-product-gallery--with-images').removeClass('border-bottom');
        }
        $(window).on('resize', function() {
            var win = $(this); //this = window
            if (win.width() < 768) {
                $('.woocommerce-product-gallery--with-images').addClass('border-bottom');
            }
            if (win.width() > 768) {
                $('.woocommerce-product-gallery--with-images').removeClass('border-bottom');
            }
        });
    });

    // initialization of quantity counter
    $.HSCore.components.HSQantityCounter.init('.js-quantity');
</script>
@endsection
