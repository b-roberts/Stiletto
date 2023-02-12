@if($article->forwardConnections->where('pivot.relationship','SUBREGION_OF')->count())
<x-card>
       <h1>SubRegion Of</h1>
        @foreach($article->forwardConnections->where('pivot.relationship','SUBREGION_OF') as $connection)
            @include('modules.article_media',['article'=>$connection])
        @endforeach
</x-card>
@endif

@if($article->reverseConnections->where('pivot.relationship','SUBREGION_OF')->count())
<x-card>
       <h1>SubRegions</h1>
        @foreach($article->reverseConnections->where('pivot.relationship','SUBREGION_OF') as $connection)
            @include('modules.article_media',['article'=>$connection])
        @endforeach
</x-card>
@endif
@php
$neighboringRegions = $article->reverseConnections->where('pivot.relationship','NEIGHBOR_OF')->concat($article->forwardConnections->where('pivot.relationship','NEIGHBOR_OF'));
@endphp
@if($neighboringRegions->count())
<x-card>
       <h1>Neibhoring Regions</h1>
        @foreach($neighboringRegions as $connection)
            @include('modules.article_media',['article'=>$connection])
        @endforeach
</x-card>
@endif