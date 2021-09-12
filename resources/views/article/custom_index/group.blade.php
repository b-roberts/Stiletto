<div class="card">
    <div class="card-body">
        <h1>Leader</h1>
        @foreach($article->reverseConnections->where('pivot.relationship','LEADER_OF') as $connection)
            @include('modules.article_media',['article'=>$connection])
        @endforeach
        <h1>Champion</h1>
        @foreach($article->reverseConnections->where('pivot.relationship','CHAMPION_OF') as $connection)
            @include('modules.article_media',['article'=>$connection])
        @endforeach
       <h1>Members / Agents</h1>
        @foreach($article->reverseConnections->whereIn('pivot.relationship',
        ['MEMBER_OF', 'AGENT_OF']) as $connection)
            @include('modules.article_media',['article'=>$connection])
        @endforeach
        @foreach($article->forwardConnections->whereIn('pivot.relationship',
        ['FACTION_OF']) as $connection)
            @include('modules.article_media',['article'=>$connection])
        @endforeach
    </div>
</div>