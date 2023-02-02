@if ($childs->childrenRecursive->isEmpty())
    <li><a href="{{URL::to('books/category='.$childs->id)}}" class="dropdown-item link-black-100">{{ $childs->category_name }}</a>
    </li>
@elseif($childs->childrenRecursive)
    <li class="position-relative">
        <a id="shopDropdownsubmenuoneInvoker" href="{{URL::to('books/category='.$childs->id)}}"
            class="dropdown-toggle dropdown-item dropdown-item__sub-menu link-black-100 d-flex align-items-center justify-content-between"
            aria-haspopup="true" aria-expanded="false" data-unfold-event="hover"
            data-unfold-target="#shopDropdownsubMenu{{$level}}" data-unfold-type="css-animation" data-unfold-duration="200"
            data-unfold-delay="100" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp"
            data-unfold-animation-out="fadeOut">{{ $childs->category_name }}
        </a>
        <ul id="shopDropdownsubMenu{{$level}}"
            class="dropdown-unfold dropdown-menu dropdown-sub-menu font-size-2 rounded-0 border-gray-900"
            aria-labelledby="shopDropdownsubmenuoneInvoker">
            @foreach ($childs->childrenRecursive as $childs)
                @include('includes.lib_cat', ['childs' => $childs, 'level'=>$level+1])
            @endforeach
        </ul>
    </li>
@endif
