@extends('layout')
@push('styles')
<link herf="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
@endpush
@section('breadcrumbs')
  <x-breadcrumb href="{{route('article.index')}}">Articles</x-breadcrumb>
  <x-breadcrumb href="{{route('concept',['concept'=>$article->concept])}}">{{$article->concept}}</x-breadcrumb>
  @includeif('article.breadcrumb.' . $article->concept)
  <x-breadcrumb href="{{route('article.show', ['article'=>$article])}}">{{$article->title}}</x-breadcrumb>
  <x-breadcrumb active>Link</x-breadcrumb>
@endsection
@section('breadcrumb-menu')
<a href="{{route('article.edit',['article'=>$article])}}">Edit</a>
@endsection
@section('content')
<h1>{{$article->title}}</h1>
<h2>{{$article->summary}}</h2>
<x-card>
{{Form::model($article, ['route'=>['article.link',$article],'method'=>'put'])}}

<div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    {{Form::select('relation',$connectionTypes,null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input id="related_display" class="form-control">
    <input type="hidden" name="related" />
</div>

<div class="form-group">
    <label for="exampleFormControlInput1">Reverse Connection</label>
    {{Form::checkbox('reverse',null,false,['class'=>'form-check'])}}
</div>

  
{{Form::submit('Save',['class'=>'btn btn-primary'])}}
{{Form::close()}}
</x-card>


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