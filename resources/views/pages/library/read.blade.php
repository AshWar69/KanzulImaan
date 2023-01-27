@extends('layouts.lib')

@section('lib_content')
    <style>
        .pdftoolbar,
        .pdftoolbar i {
            font-size: 14px;
        }

        .pdftoolbar span {
            margin-right: 0.5em;
            margin-left: 0.5em;
            width: 4em !important;
            font-size: 12px;
        }

        .pdftoolbar .btn-sm {
            padding: 0.12rem 0.25rem;

        }

        .pdftoolbar {
            width: 100%;
            height: auto;
            background: #ddd;
            z-index: 100;
        }

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

        /* #pdf-render {
                    width: 800px;
                    height: 1293px;
                } */
        @media (max-width : 600px) {
            /* #pdf-render {
                width: 300px;
                height: 600px;
            } */
        }
    </style>

    <input type="hidden" name="file" value="{{$file->file}}">
    <div class="row col-12 h-100">
        <div class="card col-12 ml-3 mb-2">
            <div class="card-header">
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
            </div>
            <div class="card-body bg-dark">
                <canvas id="pdf-render" height="1293" width="1250"></canvas>
            </div>
        </div>
        {{-- <div class="pdftoolbar text-center row m-0 p-0">
            <div class="col-12 col-lg-6 my-1">
                <button class="btn btn-secondary btn-sm btn-first" onclick="pdfViewer.first()"><i
                        class="material-icons-outlined">skip_previous</i></button>
                <button class="btn btn-secondary btn-sm btn-prev" onclick="pdfViewer.prev(); return false;"><i
                        class="material-icons-outlined">navigate_before</i></button>
                <span class="pageno"></span>
                <button class="btn btn-secondary btn-sm btn-next" onclick="pdfViewer.next(); return false;"><i
                        class="material-icons-outlined">navigate_next</i></button>
                <button class="btn btn-secondary btn-sm btn-last" onclick="pdfViewer.last()"><i
                        class="material-icons-outlined">skip_next</i></button>
            </div>
            <div class="col-12 col-lg-6 my-1">
                <button class="btn btn-secondary btn-sm" onclick="pdfViewer.setZoom('out')"><i
                        class="material-icons-outlined">zoom_out</i></button>
                <span class="zoomval">100%</span>
                <button class="btn btn-secondary btn-sm" onclick="pdfViewer.setZoom('in')"><i
                        class="material-icons-outlined">zoom_in</i></button>
                <button class="btn btn-secondary btn-sm ms-3" onclick="pdfViewer.setZoom('width')"><i
                        class="material-icons-outlined">swap_horiz</i></button>
                <button class="btn btn-secondary btn-sm" onclick="pdfViewer.setZoom('height')"><i
                        class="material-icons-outlined">swap_vert</i></button>
                <button class="btn btn-secondary btn-sm" onclick="pdfViewer.setZoom('fit')"><i
                        class="material-icons-outlined">fit_screen</i></button>
            </div>
        </div>
        <div class="pdfpages">
            <div class="pdfpage placeholder">
            </div>
        </div> --}}
    </div>
@endsection

@section('scripts')
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    {{-- <script src="{{ asset('front/js/pdfjsviewer.js') }}"></script> --}}
    <script>
        // override the PDF path
        //let PDFFILE = "http://127.0.0.1:8000/back/pdf/Marketing Proposal Hotel Bellazio - DevBros IT Company.pdf";

        // let pdfViewer = new PDFjsViewer($('.pdfpages'));
        // pdfViewer.loadDocument(PDFFILE).then(function() {
        //     pdfViewer.setZoom("fit");
        // });
        const url = "http://127.0.0.1:8000/back/pdf/Marketing Proposal Hotel Bellazio - DevBros IT Company.pdf";

        let pdfDoc = null,
            pageNum = 1,
            pageIsRendering = false,
            pageNumIsPending = null;

        const scale = 1.5,
            canvas = document.querySelector('#pdf-render'),
            ctx = canvas.getContext('2d');

        // Render the page
        const renderPage = num => {
            pageIsRendering = true;

            // Get page
            pdfDoc.getPage(num).then(page => {
                // Set scale
                const viewport = page.getViewport({
                    scale
                });
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                const renderCtx = {
                    canvasContext: ctx,
                    viewport
                };

                page.render(renderCtx).promise.then(() => {
                    pageIsRendering = false;

                    if (pageNumIsPending !== null) {
                        renderPage(pageNumIsPending);
                        pageNumIsPending = null;
                    }
                });

                // Output current page
                document.querySelector('#page-num').textContent = num;
            });
        };

        // Check for pages rendering
        const queueRenderPage = num => {
            if (pageIsRendering) {
                pageNumIsPending = num;
            } else {
                renderPage(num);
            }
        };

        // Show Prev Page
        const showPrevPage = () => {
            if (pageNum <= 1) {
                return;
            }
            pageNum--;
            queueRenderPage(pageNum);
        };

        // Show Next Page
        const showNextPage = () => {
            if (pageNum >= pdfDoc.numPages) {
                return;
            }
            pageNum++;
            queueRenderPage(pageNum);
        };

        // Get Document
        pdfjsLib
            .getDocument(url)
            .promise.then(pdfDoc_ => {
                pdfDoc = pdfDoc_;

                document.querySelector('#page-count').textContent = pdfDoc.numPages;

                renderPage(pageNum);
            })
            .catch(err => {
                // Display error
                const div = document.createElement('div');
                div.className = 'error';
                div.appendChild(document.createTextNode(err.message));
                document.querySelector('body').insertBefore(div, canvas);
                // Remove top bar
                document.querySelector('.top-bar').style.display = 'none';
            });

        // Button Events
        document.querySelector('#prev-page').addEventListener('click', showPrevPage);
        document.querySelector('#next-page').addEventListener('click', showNextPage);

        $(window).on('resize', function() {
            var win = $(this); //this = window
            // console.log(win.width());
            // if (win.width() <= 600) {

            //     $('#pdf-render').width(win.width()/1.3);
            //     $('#pdf-render').height(win.height()/2);
            // }
            if (win.width() >= 1280) {
                /* ... */ }
        });
    </script>
@endsection
