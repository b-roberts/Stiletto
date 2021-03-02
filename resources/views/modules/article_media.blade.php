<div class="media my-3">
    <img src="{{$article->imageurl}}" class=" align-self-start mr-3" style="max-height:7em; max-width:7em;"/>
    <a href="{{route('article.show',['article'=>$article])}}" class="media-body article-link" data-article-id="{{$article->id}}">
        <p class="h3 mb-0">{{$article->title}}</p>
        <p>{{$article->summary}}</p>
    </a>
</div>