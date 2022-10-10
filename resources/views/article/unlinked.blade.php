@extends('layout')
@section('page_title')
Articles
@endsection
@section('breadcrumbs')
@endsection
@section('breadcrumb-menu')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            @foreach($articles as $article)
                @include('modules.article_media',['article'=>$article])
            @endforeach
        </div>
    </div>

@endsection