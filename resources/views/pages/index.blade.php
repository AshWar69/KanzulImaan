@extends('layouts.main')
@section('content')

  <section class="space-bottom-3">
    <div class="bg-gray-200 space-2 space-lg-0 bg-img-hero"
      style="background-image: url({{asset('/img/1920x588/img1.jpg')}});">
      <div class="container">
        <div class="js-slick-carousel u-slick"
          data-pagi-classes="text-center u-slick__pagination position-absolute right-0 left-0 mb-n8 mb-lg-4 bottom-0">
          @foreach($banners as $ban)
          <div class="js-slide">
            <div class="hero row min-height-588 align-items-center">
              <div class="col-lg-7 col-wd-6 mb-4 mb-lg-0">
                <div class="media-body mr-wd-4 align-self-center mb-4 mb-md-0">
                  <p class="hero__pretitle text-uppercase font-weight-bold text-gray-400 mb-2"
                    data-scs-animation-in="fadeInUp" data-scs-animation-delay="200">{{$ban->subheading}}</p>
                  <h2 class="hero__title font-size-14 mb-4" data-scs-animation-in="fadeInUp"
                    data-scs-animation-delay="300">
                    <span class="hero__title-line-1 font-weight-regular d-block">{{$ban->heading}}</span>
                    {{-- <span class="hero__title-line-2 font-weight-bold d-block">February</span> --}}
                  </h2>
                  <a href="{{URL::to($ban->link)}}"
                    class="btn btn-dark btn-wide rounded-0 hero__btn" data-scs-animation-in="fadeInLeft"
                    data-scs-animation-delay="400">{{$ban->link}}</a>
                </div>
              </div>
              <div class="col-lg-5 col-wd-6" data-scs-animation-in="fadeInRight" data-scs-animation-delay="500">
                <img class="img-fluid" src="{{asset('back/images/banner_images/'.$ban->image)}}" alt="{{$ban->heading}}">
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  <section class="space-bottom-3">
    <div class="container">
      <header class="mb-5 d-md-flex justify-content-between align-items-center">
        <h2 class="font-size-7 mb-3 mb-md-0">Categories</h2>
      </header>
      <ul class="list-unstyled my-0 row row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-wd-5">
        <li class="product-category col mb-4 mb-xl-0">
          <div class="product-category__inner bg-indigo-light px-6 py-5">
            <div class="product-category__icon font-size-12 text-primary-indigo"><i
                class="glyph-icon fa fa-book-reader"></i></div>
            <div class="product-category__body">
              <a href="{{URL::to('QuranStore')}}"
                class="stretched-link text-dark"><h2 class="text-truncate font-size-3">Quran Store</h2>
              <a href="{{URL::to('QuranStore')}}" class="stretched-link text-dark">Shop Now</a></a>
            </div>
          </div>
        </li>
        <li class="product-category col mb-4 mb-xl-0">
          <div class="product-category__inner bg-tangerine-light px-6 py-5">
            <div class="product-category__icon font-size-12 text-tangerine"><i class="glyph-icon flaticon-cloud-computing"></i>
            </div>
            <div class="product-category__body">
              <h3 class="text-truncate font-size-3">Library</h3>
              <a href="#" class="stretched-link text-dark">Visit Now</a>
            </div>
          </div>
        </li>
        <li class="product-category col mb-4 mb-xl-0">
          <div class="product-category__inner bg-chili-light px-6 py-5">
            <div class="product-category__icon font-size-12 text-chili"><i class="glyph-icon flaticon-information"></i></div>
            <div class="product-category__body">
              <h3 class="text-truncate font-size-3">Research</h3>
              <a href="#"
                class="stretched-link text-dark">See Now</a>
            </div>
          </div>
        </li>
        <li class="product-category col mb-4 mb-xl-0">
          <div class="product-category__inner bg-carolina-light px-6 py-5">
            <div class="product-category__icon font-size-12 text-carolina"><i class="glyph-icon flaticon-heart"></i>
            </div>
            <div class="product-category__body">
              <h3 class="text-truncate font-size-3">About Us</h3>
              <a href="#"
                class="stretched-link text-dark">Have a Look</a>
            </div>
          </div>
        </li>
        {{-- <li class="product-category col mb-4 mb-xl-0 d-xl-none d-wd-block">
          <div class="product-category__inner bg-punch-light px-6 py-5">
            <div class="product-category__icon font-size-12 text-punch"><i class="glyph-icon flaticon-resume"></i></div>
            <div class="product-category__body">
              <h3 class="text-truncate font-size-3">Biography</h3>
              <a href="https://demo2.madrasthemes.com/bookworm-html/redesigned-octo-fiesta/html-demo/shop/v1.html"
                class="stretched-link text-dark">Shop Now</a>
            </div>
          </div>
        </li> --}}
      </ul>
    </div>
  </section>
@endsection
