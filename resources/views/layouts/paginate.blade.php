@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul
            class="pagination pagination__custom justify-content-md-center flex-nowrap flex-md-wrap overflow-auto overflow-md-visble">
            @if ($paginator->onFirstPage())
                <li class="flex-shrink-0 flex-md-shrink-1 page-item disabled"><a class="page-link"
                        href="#">Previous</a></li>
            @else
                <li class="flex-shrink-0 flex-md-shrink-1 page-item"><a class="page-link"
                        href="{{ $paginator->previousPageUrl() }}">Previous</a></li>
            @endif
            @php
                $interval = isset($interval) ? abs(intval($interval)) : 3;
                $from = $paginator->currentPage() - $interval;
                if ($from < 1) {
                    $from = 1;
                }

                $to = $paginator->currentPage() + $interval;
                if ($to > $paginator->lastPage()) {
                    $to = $paginator->lastPage();
                }
            @endphp
            @for ($i = $from; $i <= $to; $i++)
                <li class="flex-shrink-0 flex-md-shrink-1 page-item @if ($paginator->currentPage() == $i) active @endif"><a
                        class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
            @endfor
            @if ($paginator->hasMorePages())
                <li class="flex-shrink-0 flex-md-shrink-1 page-item"><a class="page-link" href="#">Next</a>
                </li>
            @else
                <li class="flex-shrink-0 flex-md-shrink-1 page-item"><a class="page-link"
                        href="{{ $paginator->nextPageUrl() }}">Next</a></li>
            @endif
        </ul>
    </nav>
@endif
