@extends('layout')
@section('breadcrumbs')
  <x-breadcrumb href="{{route('article.index')}}">Articles</x-breadcrumb>
  <x-breadcrumb href="{{route('concept',['concept'=>$article->concept])}}">{{$article->concept}}</x-breadcrumb>
  @includeif('article.breadcrumb.' . $article->concept)
  <x-breadcrumb href="{{route('article.show', ['article'=>$article])}}">{{$article->title}}</x-breadcrumb>
  <x-breadcrumb active>Edit</x-breadcrumb>
@endsection
@section('breadcrumb-menu')
<a href="{{route('article.edit',['article'=>$article])}}">Edit</a>
@endsection
@section('content')
<h1>{{$article->title}}</h1>
<h2>{{$article->summary}}</h2>
<x-card>
{{Form::model($article, ['route'=>['article.update',$article],'method'=>'put'])}}

<div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    {{Form::text('title',null,['class'=>'form-control'])}}
  </div>


  <div class="form-group">
    <label for="exampleFormControlInput1">Summary</label>
    {{Form::text('summary',null,['class'=>'form-control'])}}
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Image</label>
    {{Form::text('imageurl',null,['class'=>'form-control'])}}
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Concept</label>
    {{Form::select('concept',$concepts,null,['class'=>'form-control'])}}
  </div>
{{Form::textarea('description',null,['id'=>'editor'])}}

<div class="form-group">
    <label for="exampleFormControlInput1">Statblock (Markdown)</label>
{{Form::textarea('statblock',null,['class'=>'form-control'])}}
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
@include('modules.editor')