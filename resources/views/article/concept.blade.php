@extends('layout')
@section('page_title')
{{$concept}}
@endsection
@section('breadcrumbs')
    <x-breadcrumb href="{{route('article.index')}}">Articles</x-breadcrumb>
    <x-breadcrumb active>{{$concept}}</x-breadcrumb>
@endsection
@section('content')
    <h1>{{$concept}}</h1>
    <x-card>
        @foreach($articles as $article)
            @include('modules.article_media',['article'=>$article])
        @endforeach
    </x-card>
@endsection