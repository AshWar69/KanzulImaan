@extends('layouts.lib')

@section('tag')
    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>Books
    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>{{ $book->slug }}
    <style>
        .top-bar {
            background: #333;
            color: #fff;
            padding: 1rem;
        }

        .pagebtn {
            background: coral;
            color: #fff;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 0.7rem 2rem;
        }

        .pagebtn:hover {
            opacity: 0.9;
        }

        .page-info {
            margin-left: 1rem;
        }

        .error {
            background: orangered;
            color: #fff;
            padding: 1rem;
        }
    </style>
@endsection

@section('lib_content')
    <div id="primary" class="content-area">
        <main id="main" class="site-main ">
            <div class="product">
                <div class="bg-punch-light">
                    <div class="container">
                        <div class="row">
                            <div
                                class="col-md-4 col-wd-5 woocommerce-product-gallery woocommerce-product-gallery--with-images images">
                                <figure class="woocommerce-product-gallery__wrapper pt-8 mb-0">
                                    <div class="js-slick-carousel u-slick"
                                        data-pagi-classes="text-center u-slick__pagination my-4">
                                        @foreach ($images as $img)
                                            @if ($book->id == $img->book_id)
                                                <div class="js-slide">
                                                    <img src="{{ asset('back/images/library_images/' . $img->image) }}"
                                                        alt="{{ $book->slug }}" class="mx-auto img-fluid">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </figure>
                            </div>
                            <div class="col-md-8 col-wd-7 pl-0 summary entry-summary">
                                <div class="space-top-2 px-4 px-xl-5 px-wd-7 pb-5">
                                    <h1 class="product_title entry-title font-size-7 mb-3" id="bookName">
                                        {{ $book->name }}</h1>
                                    <div class="mb-2 font-size-2">
                                        <span class="font-weight-medium">Book Language:</span>
                                        <span class="ml-2 text-gray-600">Choose an option</span>
                                    </div>
                                    <div id="language" class="row mx-gutters-2 mb-4">
                                        @php $i=1; @endphp
                                        @foreach ($language as $lang)
                                            <div class="col-6 col-md-3 mb-3 mb-md-0">
                                                <div class="dfile">
                                                    @if ($book->type == 'book')
                                                        <input type="hidden" name="file"
                                                            value="{{ asset('back/files/library_pdfs/' . $lang->file) }}">
                                                    @elseif($book->type == 'audio')
                                                        <input type="hidden" name="file"
                                                            value="{{ asset('back/files/library_audio/' . $lang->file) }}">
                                                    @endif
                                                    <input type="hidden" name="id" value="{{ $lang->id }}">
                                                    <input type="radio" id="typeOfListingRadio{{ $i }}"
                                                        name="lang" value="{{ $lang->language }}"
                                                        class="custom-control-input checkbox-outline__input">
                                                    <label
                                                        class="border-bottom d-block checkbox-outline__label py-3 px-1 mb-0"
                                                        for="typeOfListingRadio{{ $i }}">
                                                        <span class="d-block">{{ $lang->language }}</span>
                                                    </label>
                                                </div>
                                            </div>
                                            @php $i++; @endphp
                                        @endforeach
                                        <div class="row d-none" id="audioPlayer">
                                            @if ($book->type == 'audio')
                                                <audio controls id="player" controlsList="nodownload">
                                                    <source src="" type="audio/mpeg">
                                                </audio>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="cart d-md-flex align-items-center flex-wrap" method="post"
                                        enctype="multipart/form-data">
                                        @if ($book->type == 'book')
                                            <button type="button" id="downloadBtn"
                                                class="mb-4 mb-md-0 btn btn-dark border-0 rounded-0 py-3 btn-wide ml-md-4 single_add_to_cart_button button alt">Download</button>
                                        @endif
                                        <ul class="list-unstyled nav ml-md-5">
                                            @if ($book->type == 'book')
                                                <li class="mr-6 mb-4 mb-md-0">
                                                    <a href="#pdffile" id="readBtn" class="h-primary"><i
                                                            class="flaticon-open-book mr-2"></i> Read
                                                        Online</a>
                                                </li>
                                            @elseif($book->type == 'audio')
                                                <li class="mr-6">
                                                    <a href="#" id="listenBtn" class="h-primary"><i
                                                            class="flaticon-headphones mr-2"></i>
                                                        Listen</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="woocommerce-tabs wc-tabs-wrapper mb-10">
                    <ul class="tabs wc-tabs nav bg-punch-light pb-6 justify-content-md-center flex-nowrap flex-md-wrap overflow-auto overflow-md-visble"
                        id="pills-tab" role="tablist">
                        <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                            <a class="py-2 nav-link font-weight-medium active" id="pills-one-example1-tab"
                                data-toggle="pill" href="#pills-one-example1" role="tab"
                                aria-controls="pills-one-example1" aria-selected="true">
                                Description
                            </a>
                        </li>
                        <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                            <a class="py-2 nav-link font-weight-medium" id="pills-two-example1-tab" data-toggle="pill"
                                href="#pills-two-example1" role="tab" aria-controls="pills-two-example1"
                                aria-selected="false">
                                Product Details
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content container" id="pills-tabContent">
                        <div class="woocommerce-Tabs-panel panel col-xl-8 offset-xl-2 entry-content wc-tab tab-pane fade pt-9 show active"
                            id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab">
                            {!! $book->description !!}
                        </div>
                        <div class="woocommerce-Tabs-panel panel col-xl-8 offset-xl-2 entry-content wc-tab tab-pane fade pt-9"
                            id="pills-two-example1" role="tabpanel" aria-labelledby="pills-two-example1-tab">

                            <div class="table-responsive mb-4">
                                <table class="table table-hover table-borderless">
                                    <tbody>
                                        <tr>
                                            <th class="px-4 px-xl-5">Format: </th>
                                            <td class="">Paperback | 384 pages</td>
                                        </tr>
                                        <tr>
                                            <th class="px-4 px-xl-5">Dimensions</th>
                                            <td>9126 x 194 x 28mm | 301g</td>
                                        </tr>
                                        <tr>
                                            <th class="px-4 px-xl-5">Publication date: </th>
                                            <td>20 Dec 2020</td>
                                        </tr>
                                        <tr>
                                            <th class="px-4 px-xl-5">Publisher:</th>
                                            <td>Little, Brown Book Group</td>
                                        </tr>
                                        <tr>
                                            <th class="px-4 px-xl-5">Imprint:</th>
                                            <td>Corsair</td>
                                        </tr>
                                        <tr>
                                            <th class="px-4 px-xl-5">Publication City/Country:</th>
                                            <td>London, United Kingdom</td>
                                        </tr>
                                        <tr>
                                            <th class="px-4 px-xl-5">Language:</th>
                                            <td>English</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="card col-12 ml-3 mb-2 d-none bg-dark" id="pdffile">
                        <div id="pspdfkit" style="height: 100vh"></div>
                        {{-- <div class="card-header">
                            <div class="top-bar text-center">
                                <button class="btn pagebtn" id="prev-page">
                                    <i class="fas fa-arrow-circle-left"></i> Prev Page
                                </button>
                                <button class="btn pagebtn" id="next-page">
                                    Next Page <i class="fas fa-arrow-circle-right"></i>
                                </button>
                                <span class="page-info">
                                    Page <span id="page-num"></span> of <span id="page-count"></span>
                                </span>
                            </div>
                        </div> --}}
                        {{-- <div class="card-body bg-dark text-center">
                            <canvas id="pdf-render" height="1293" width="1250"></canvas>
                        </div> --}}
                    </div>
                </div>
                <section class="space-bottom-3">
                    <div class="container">
                        <header class="mb-5 d-md-flex justify-content-between align-items-center">
                            <h2 class="font-size-7 mb-3 mb-md-0">Customers Also Considered</h2>
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
                            @foreach ($libraries as $lib)
                                <div class="product">
                                    <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                        <div
                                            class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                            <div class="woocommerce-loop-product__thumbnail">
                                                <a href="{{ URL::to('books/name=' . $lib->slug) }}" class="d-block">
                                                    @if (isset($pimage[$lib->id]))
                                                        <img src="{{ asset('back/images/library_images/' . $pimage[$lib->id]) }}"
                                                            class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                            alt="{{ $lib->slug }}">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                                <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                                                        href="{{ URL::to('books/name=' . $lib->slug) }}">{{ $lib->name }}</a>
                                                </div>
                                                <h2
                                                    class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                    <a
                                                        href="{{ URL::to('books/name=' . $lib->slug) }}">{{ $lib->publisher }}</a>
                                                </h2>
                                                <div class="font-size-2  mb-1 text-truncate"><a
                                                        href="{{ URL::to('books/name=' . $lib->slug) }}"
                                                        class="text-gray-700">{{ $lib->author }}</a></div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script> --}}
    <script src="{{ asset('modern/pspdfkit.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#typeOfListingRadio1').prop("checked", true);
            $('#downloadBtn').click(function() {
                lang = $("input[name='lang']:checked").val();
                file = $("input[name='lang']:checked").closest('.dfile').find("input[name='file']").val();
                name = $('#bookName').text();

                if ($("input[name='lang']").is(':checked')) {
                    fetch(file, {
                            body: JSON.stringify(file),
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json; charset=utf-8'
                            },
                        })
                        .then(response => response.blob())
                        .then(response => {
                            const blob = new Blob([response], {
                                type: 'application/pdf'
                            });
                            const downloadUrl = URL.createObjectURL(blob);
                            const a = document.createElement("a");
                            a.href = downloadUrl;
                            a.download = name + "-" + lang;
                            document.body.appendChild(a);
                            a.click();
                        })
                } else {
                    Swal.fire({
                        title: "Error",
                        text: "Please Select Language First",
                        icon: 'error',
                        confirmButtonText: 'Done'
                    });
                }
            });

            $('#readBtn').click(function() {
                lang = $("input[name='lang']:checked").val();
                file = $("input[name='lang']:checked").closest('.dfile').find("input[name='file']").val();

                $('#pdffile').removeClass('d-none');

                if ($("input[name='lang']").is(':checked')) {
                    PSPDFKit.load({
                            container: "#pspdfkit",
                            document: file, // Add the path to your document here.
                            theme: PSPDFKit.Theme.AUTO
                        })
                        .then(function(instance) {
                            const items = instance.toolbarItems;
                            // Hide the toolbar item with the `id` "ink"
                            // by removing it from the array of items.
                            instance.setToolbarItems(items.filter((item) => item.type !== "ink" && item
                                .type !== "export-pdf" && item.type !== "print" && item.type !==
                                "document-editor" && item.type !== "document-crop" && item
                                .type !==
                                "ink-eraser" && item.type !== "signature" && item.type !==
                                "annotate" && item.type !== "text" &&
                                item.type !== "pan" && item.type !== "image" && item.type !==
                                "stamp" && item.type !== "note" && item.type !== "line" && item
                                .type !== "link" && item.type !== "arrow" &&
                                item.type !== "rectangle" && item.type !== "ellipse" && item
                                .type !== "polygon" && item.type !== "cloudy-polygon" && item
                                .type !== "polyline" && item.type !== "highlighter" && item
                                .type !==
                                "text-highlighter" &&
                                item.type !== "sidebar-document-outline" && item.type !==
                                "sidebar-annotations" && item.type !== "sidebar-bookmarks" &&
                                item
                                .type !== "spacer" && item.type !== "debug"));
                        })
                        .catch(function(error) {
                            alert(error.message);
                        });;
                } else {
                    Swal.fire({
                        title: "Error",
                        text: "Please Select Language First",
                        icon: 'error',
                        confirmButtonText: 'Done'
                    });
                }

                // if ($("input[name='lang']").is(':checked')) {

                //     $('#pdffile').removeClass('d-none');

                //     const url = file;

                //     let pdfDoc = null,
                //         pageNum = 1,
                //         pageIsRendering = false,
                //         pageNumIsPending = null;

                //     const scale = 1.5,
                //         canvas = document.querySelector('#pdf-render'),
                //         ctx = canvas.getContext('2d');

                //     // Render the page
                //     const renderPage = num => {
                //         pageIsRendering = true;

                //         // Get page
                //         pdfDoc.getPage(num).then(page => {
                //             // Set scale
                //             const viewport = page.getViewport({
                //                 scale
                //             });
                //             canvas.height = viewport.height;
                //             canvas.width = viewport.width;

                //             const renderCtx = {
                //                 canvasContext: ctx,
                //                 viewport
                //             };

                //             page.render(renderCtx).promise.then(() => {
                //                 pageIsRendering = false;

                //                 if (pageNumIsPending !== null) {
                //                     renderPage(pageNumIsPending);
                //                     pageNumIsPending = null;
                //                 }
                //             });

                //             // Output current page
                //             document.querySelector('#page-num').textContent = num;
                //         });
                //     };

                //     // Check for pages rendering
                //     const queueRenderPage = num => {
                //         if (pageIsRendering) {
                //             pageNumIsPending = num;
                //         } else {
                //             renderPage(num);
                //         }
                //     };

                //     // Show Prev Page
                //     const showPrevPage = () => {
                //         if (pageNum <= 1) {
                //             return;
                //         }
                //         pageNum--;
                //         queueRenderPage(pageNum);
                //     };

                //     // Show Next Page
                //     const showNextPage = () => {
                //         if (pageNum >= pdfDoc.numPages) {
                //             return;
                //         }
                //         pageNum++;
                //         queueRenderPage(pageNum);
                //     };

                //     // Get Document
                //     pdfjsLib
                //         .getDocument(url)
                //         .promise.then(pdfDoc_ => {
                //             pdfDoc = pdfDoc_;

                //             document.querySelector('#page-count').textContent = pdfDoc.numPages;

                //             renderPage(pageNum);
                //         })
                //         .catch(err => {
                //             // Display error
                //             const div = document.createElement('div');
                //             div.className = 'error';
                //             div.appendChild(document.createTextNode(err.message));
                //             document.querySelector('body').insertBefore(div, canvas);
                //             // Remove top bar
                //             document.querySelector('.top-bar').style.display = 'none';
                //         });

                //     // Button Events
                //     document.querySelector('#prev-page').addEventListener('click', showPrevPage);
                //     document.querySelector('#next-page').addEventListener('click', showNextPage);
                // } else {
                //     Swal.fire({
                //         title: "Error",
                //         text: "Please Select Language First",
                //         icon: 'error',
                //         confirmButtonText: 'Done'
                //     });
                // }
            });

            $('#listenBtn').click(function() {
                lang = $("input[name='lang']:checked").val();
                file = $("input[name='lang']:checked").closest('.dfile').find("input[name='file']").val();
                name = $('#bookName').text();

                if ($("input[name='lang']").is(':checked')) {
                    $('#audioPlayer').removeClass('d-none');
                    $('#player').attr('src', file);
                } else {
                    Swal.fire({
                        title: "Error",
                        text: "Please Select Language First",
                        icon: 'error',
                        confirmButtonText: 'Done'
                    });
                }
            });
        });
    </script>
@endsection
