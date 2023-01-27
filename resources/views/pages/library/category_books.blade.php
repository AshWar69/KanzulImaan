@extends('layouts.lib')

@section('tag')
    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>Category
    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>Books
@endsection

@section('lib_content')
    <div class="site-content" id="content">
        <div class="container">
            <div class="row">
                <div id="primary" class="content-area order-2">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-one-example1" role="tabpanel"
                            aria-labelledby="pills-one-example1-tab">
                            <ul
                                class="products list-unstyled row no-gutters row-cols-2 row-cols-lg-3 row-cols-xl-5 row-cols-wd-6  border-top border-left mb-6">
                                @foreach($libraries as $library)
                                <li class="product col">
                                    <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                        <div
                                            class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                            <div class="woocommerce-loop-product__thumbnail">
                                                <a href="{{URL::to('books/'.$data->slug)}}" class="d-block">
                                                    @if($pimage[$data->id])
                                                    <img src="{{asset('back/images/library_images/'.$pimage[$data->id])}}"
                                                        class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                        alt="{{$data->slug}}">
                                                    @endif
                                                    </a>
                                            </div>
                                            <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                                <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                        href="{{URL::to('books/'.$data->slug)}}">{{$data->name}}</a></div>
                                                <h2
                                                    class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                    <a href="{{URL::to('books/'.$data->slug)}}">{{$data->publisher}}</a></h2>
                                                <div class="font-size-2  mb-1 text-truncate"><a
                                                        href="{{URL::to('books/'.$data->slug)}}"
                                                        class="text-gray-700">{{$data->author}}</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    {{$libraries->onEachSide(3)->links('layouts.paginate')}}
                </div>
            </div>
        </div>
    </div>
@endsection
