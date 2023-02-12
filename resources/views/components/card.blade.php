<div class="card" {{ $attributes }}>
    @isset($title)
    <div class="card-header">
        <span class="h4">
        {{$title}}
        </span>
    </div>
    @endisset
    <div class="card-body">
        {{ $slot }}
    </div>
</div>