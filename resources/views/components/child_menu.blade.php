@if ($categoryParent->cateGoryChild->count())

<ul role="menu" class="sub-menu">
    @foreach ($categoryParent->cateGoryChild as $categoryChild)
    <li>
        <a href="shop.html">{{$categoryChild->name}}</a>
        @if ($categoryParent->cateGoryChild->count())
            @include('components.child_menu',['categoryParent'=>$categoryChild])
        @endif
    </li>
    @endforeach

</ul>

@endif