@if($article->forwardConnections->where('pivot.relationship','SUBREGION_OF')->count())
<div class="card">
    <div class="card-body">
       <h1>SubRegion Of</h1>
        @foreach($article->forwardConnections->where('pivot.relationship','SUBREGION_OF') as $connection)
            @include('modules.article_media',['article'=>$connection])
        @endforeach
    </div>
</div>
@endif

@if($article->reverseConnections->where('pivot.relationship','SUBREGION_OF')->count())
<div class="card">
    <div class="card-body">
       <h1>SubRegions</h1>
        @foreach($article->reverseConnections->where('pivot.relationship','SUBREGION_OF') as $connection)
            @include('modules.article_media',['article'=>$connection])
        @endforeach
    </div>
</div>
@endif
@php
$neighboringRegions = $article->reverseConnections->where('pivot.relationship','NEIGHBOR_OF')->concat($article->forwardConnections->where('pivot.relationship','NEIGHBOR_OF'));
@endphp
@if($neighboringRegions->count())
<div class="card">
    <div class="card-body">
       <h1>Neibhoring Regions</h1>
        @foreach($neighboringRegions as $connection)
            @include('modules.article_media',['article'=>$connection])
        @endforeach
    </div>
</div>
@endif