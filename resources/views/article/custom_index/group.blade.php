<div class="card">
    <div class="card-body">
       <h1>Members</h1>
        @foreach($article->reverseConnections->where('pivot.relationship','MEMBER_OF') as $connection)
            @include('modules.article_media',['article'=>$connection])
        @endforeach
    </div>
</div>