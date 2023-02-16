@if ($childs->childrenRecursive->isEmpty())
    <li>
        <a href="{{URL::to('books/category='.$childs->id)}}">{{ $childs->category_name }}</a>
    </li>
@else
<li class="has-submenu">
    <a class="catLink" href="{{URL::to('books/category='.$childs->id)}}">{{ $childs->category_name }}</a> <span class="ic text-dark" data-submenu="off-home{{$level}}"><i class="fa fa-angle-right"></i></span>
    <div id="off-home{{$level}}" class="submenu js-scrollbar">
        <div class="submenu-header" data-submenu-close="off-home{{$level}}">
            <a href="#">{{ $childs->category_name }}</a>
        </div>
        <ul>
                @foreach ($childs->childrenRecursive as $child)
                    @include('includes.menu', [
                        'childs' => $child, 'level'=>$level+1
                    ])
                @endforeach
        </ul>
    </div>
</li>
@endif
