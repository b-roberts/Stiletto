@extends('layout')
@section('breadcrumbs')
  <x-breadcrumb href="{{route('article.index')}}">Articles</x-breadcrumb>
  <x-breadcrumb active>Create</x-breadcrumb>
@endsection
@section('breadcrumb-menu')
@endsection
@section('content')
<x-card>
{{Form::open( ['route'=>['article.store'],'method'=>'post'])}}

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


@include('modules.editor')