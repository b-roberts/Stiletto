<div class="card">
    <div class="card-body">
        @foreach($article->forwardConnections as $connection)
            @include('modules.article_media',['article'=>$connection])
        @endforeach
        @foreach($article->reverseConnections as $connection)
            @include('modules.article_media',['article'=>$connection])
        @endforeach
    </div>
</div>