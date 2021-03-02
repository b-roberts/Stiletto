@extends('layout')
@push('styles')
<link herf="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
@endpush
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="#">{{$article->concept}}</a> </li>
<li class="breadcrumb-item active" aria-current="page">{{$article->title}}</li>

@endsection
@section('breadcrumb-menu')
{{Form::model($connection, ['route'=>['connection.destroy',$connection],'method'=>'delete', 'class'=>'form-inline'])}}
<button class="btn btn-link">Delete</button>
{{Form::close()}}
@endsection
@section('content')
<h1>{{$article->title}}</h1>
<h2>{{$article->summary}}</h2>
<div class="card">
<div class="card-body">
{{Form::model($connection, ['route'=>['connection.update',$connection],'method'=>'put'])}}

<div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    {{Form::select('relation',$connectionTypes,$relation,['class'=>'form-control'])}}
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input id="related_display" class="form-control" value="{{$link->title}}">
    <input type="hidden" name="related" value="{{$link->id}}"/>
</div>

<div class="form-group">
    <label for="exampleFormControlInput1">Reverse Connection</label>
    {{Form::checkbox('reverse',null,false,['class'=>'form-check'])}}
</div>

  
{{Form::submit('Save',['class'=>'btn btn-primary'])}}
{{Form::close()}}
</div>
</div>


@endsection

@section('sidebar')
<ul class="nav flex-column">
@foreach($article->forwardConnections as $connection)
  <li class="nav-item">
    <a class="nav-link" href="{{route('article.show', ['article'=>$connection])}}"><small>{{$connection->pivot->relationship}}</small><br />{{$connection->title}} </a>
  </li>
@endforeach
@foreach($article->reverseConnections as $connection)
  <li class="nav-item">
    <a class="nav-link" href="{{route('article.show', ['article'=>$connection])}}"><small>{{substr($connection->pivot->relationship,0,-3)}}</small><br />{{$connection->title}} </a>
  </li>
@endforeach
</ul>
@endsection
@push('scripts')

<script>
$('#related_display').autocomplete({
    source: {!! json_encode($articles) !!}, 
    select: function (event, ui) {
        $("#txtAllowSearch").val(ui.item.label); // display the selected text
        $("input[name='related']").val(ui.item.id); // save selected id to hidden input
    }
});

$('#button').click(function() {
    alert($("#txtAllowSearchID").val()); // get the id from the hidden input
}); 
</script>
@endpush