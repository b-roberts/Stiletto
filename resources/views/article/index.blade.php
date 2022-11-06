@extends('layout')
@section('page_title')
Articles
@endsection
@section('breadcrumbs')
@endsection
@section('breadcrumb-menu')
@endsection
@section('content')
    @foreach($conceptArticles as $concept=>$articles)
        <h1>{{$concept}}</h1>
        <div class="card">
            <div class="card-body">
                @foreach($articles as $article)
                    @include('modules.article_media',['article'=>$article])
                @endforeach
            </div>
        </div>
    @endforeach
<script>
var json = {!!json_encode($graph)!!};
</script>
<div id="inner-details"></div>
    <div id ="infovis" style="height:75vh; background:black; overflow:hidden; "></div>

    <script src="{{asset('js/test.js')}}"></script>
    <script src="{{asset('js/rgraph.js')}}"></script>
@endsection