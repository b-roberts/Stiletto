<li 
    class="breadcrumb-item {{isset($active) ?'active': ""}}" 
    @isset($active)
        aria-current="page"
    @endisset
>
    @isset($href)
        <a href="{{$href}}">
    @endisset
        {{$slot}}
    @isset($href)
        </a>
    @endisset
</li>