@extends('layout')
@section('page_title')
Articles
@endsection
@section('breadcrumbs')
@endsection
@section('breadcrumb-menu')
@endsection
@section('content')

<div class="nav-tabs-boxed">
    <ul class="nav nav-tabs" role="tablist">
        @foreach($conceptArticles->keys() as $concept)
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-{{Str::slug($concept)}}" role="tab" aria-controls="tab-{{Str::slug($concept)}}">{{$concept}}</a>
            </li>
        @endforeach
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab-graph" role="tab" aria-controls="home">Graph</a>
        </li>
    </ul>
</div>
<div class="tab-content">
    @foreach($conceptArticles as $concept=>$articles)
        <div class="tab-pane" id="tab-{{Str::slug($concept)}}" role="tabpanel">
            <h1>{{$concept}}</h1>
            <div class="row">
                @foreach($articles as $article)
                    <div class="col-12 col-xl-3">
                        @include('modules.article_media',['article'=>$article])
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach


    <script>
    var json = {!!json_encode($graph)!!};
    </script>
    <div class="tab-pane" id="tab-graph" role="tabpanel">
        <div id="inner-details"></div>
        <div id ="infovis" style="height:75vh; background:black; overflow:hidden; "></div>
    </div>
</div>
    <script src="{{asset('js/test.js')}}"></script>
    <script src="{{asset('js/rgraph.js')}}"></script>
@endsection