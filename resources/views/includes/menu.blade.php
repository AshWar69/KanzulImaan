@if ($childs->childrenRecursive->isEmpty())
    <li>
        <a href="{{URL::to('books/category='.$childs->id)}}">{{ $childs->category_name }}</a>
    </li>
@else
<li class="has-submenu py-3">
    <a class="catLink" href="{{URL::to('books/category='.$childs->id)}}">{{ $childs->category_name }}</a> <span class="ic text-dark" data-submenu="off-home{{$id}}{{$slevel}}"><i class="fa fa-angle-right"></i></span>
    <div id="off-home{{$id}}{{$slevel}}" class="submenu js-scrollbar">
        <div class="submenu-header" data-submenu-close="off-home{{$id}}{{$slevel}}">
            <a href="#">{{ $childs->category_name }}</a>
        </div>
        <ul>
                @foreach ($childs->childrenRecursive as $child)
                    @include('includes.menu', [
                        'childs' => $child, 'slevel'=>$slevel+1, 'id'=>$id
                    ])
                @endforeach
        </ul>
    </div>
</li>
@endif
