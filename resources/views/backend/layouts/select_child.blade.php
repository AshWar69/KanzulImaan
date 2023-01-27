<option value="{{ $childs->id }}">{{$cat}} > {{ $childs->category_name }}</option>
@if ($childs->childrenRecursive)
    @foreach ($childs->childrenRecursive as $child)
        @include('backend.layouts.select_child', ['childs' => $child, 'cat' => $childs->category_name,])
    @endforeach
@endif
