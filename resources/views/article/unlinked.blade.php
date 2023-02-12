@extends('layout')
@section('page_title')
Unlinked Articles
@endsection
@section('content')
    <x-card title="Unlinked Articles">
        @foreach($articles as $article)
            @include('modules.article_media',['article'=>$article])
        @endforeach
    </x-card>
@endsection