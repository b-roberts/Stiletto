@extends('layout')
@push('styles')
<link herf="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
@endpush
@section('breadcrumbs')
  <x-breadcrumb href="{{route('article.index')}}">Articles</x-breadcrumb>
  <x-breadcrumb href="{{route('concept',['concept'=>$article->concept])}}">{{$article->concept}}</x-breadcrumb>
  @includeif('article.breadcrumb.' . $article->concept)
  <x-breadcrumb href="{{route('article.show', ['article'=>$article])}}">{{$article->title}}</x-breadcrumb>
  <x-breadcrumb active>AutoLink</x-breadcrumb>
@endsection
@section('breadcrumb-menu')
<a href="{{route('article.edit',['article'=>$article])}}">Edit</a>
@endsection
@section('content')
<h1>{{$article->title}}</h1>
<h2>{{$article->summary}}</h2>
@foreach($potentialLinks as $id=>$potentialLink)
<x-card>
{{Form::model($article, ['route'=>['article.link',$article],'method'=>'put'])}}

<div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    {{Form::select('relation',$connectionTypes,null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input readonly class="form-control" value="{{$potentialLink}}">
    <input type="hidden" name="related"  value="{{$id}}"/>
</div>

<div class="form-group">
    <label for="exampleFormControlInput1">Reverse Connection</label>
    {{Form::checkbox('reverse',null,false,['class'=>'form-check'])}}
</div>

  
{{Form::submit('Save',['class'=>'btn btn-primary'])}}
{{Form::close()}}
</x-card>
@endforeach

@endsection

