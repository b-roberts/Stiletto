@extends('layout')
@section('page_title')
{{$concept}}
@endsection
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('article.index')}}">Articles</a> </li>
<li class="breadcrumb-item active" aria-current="page">{{$concept}}</li>
@endsection
@section('content')
<h1>{{$concept}}</h1>
<div class="card">
<div class="card-body">
@foreach($articles as $article)
@include('modules.article_media',['article'=>$article])

@endforeach
</div>
</div>
@endsection