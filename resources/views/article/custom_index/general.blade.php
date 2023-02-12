<x-card>
    @foreach($article->forwardConnections as $connection)
        @include('modules.article_media',['article'=>$connection])
    @endforeach
    @foreach($article->reverseConnections as $connection)
        @include('modules.article_media',['article'=>$connection])
    @endforeach
</x-card>