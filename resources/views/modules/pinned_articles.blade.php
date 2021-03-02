
<div class="list-group list-group-flush">
@foreach($pins as $pin)
    <a class="list-group-item" href="{{$pin->pinnable->route()}}">{{$pin->pinnable->title}}</a>
@endforeach
</div>