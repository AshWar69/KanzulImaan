<li>
    @if ($childs->childrenRecursive->isEmpty())
        {{ $childs->category_name }}
    @else
        <details @if ($childs->childrenRecursive->isEmpty()) @else open @endif>
            <summary>{{ $childs->category_name }}</summary>
        </details>
    @endif
    @if ($childs->childrenRecursive)
        <ul>
            @foreach ($childs->childrenRecursive as $child)
                @include('backend.pages.library.child', ['childs' => $child])
            @endforeach
        </ul>
    @endif
</li>
