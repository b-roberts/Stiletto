@extends('layout')
@section('page_title')
{{$article->title}}
@endsection
@section('breadcrumbs')
    <x-breadcrumb href="{{route('article.index')}}">Articles</x-breadcrumb>
    <x-breadcrumb href="{{route('concept',['concept'=>$article->concept])}}">{{$article->concept}}</x-breadcrumb>
    @includeif('article.breadcrumb.' . $article->concept)
    <x-breadcrumb active>{{$article->title}}</x-breadcrumb>
@endsection

@push('styles')
<style>
#articleContent blockquote{
	padding:1em;
    color: #336573;
    background-color: #e0f3f8;
    border-color: #d3eef6;
}
</style>
@endpush
@section('breadcrumb-menu')
    <a href="{{route('article.edit',['article'=>$article])}}" class="btn btn-link">Edit</a>
    <a href="{{route('link',['article'=>$article])}}" class="btn btn-link">Link</a>
    <a href="{{route('autolink',['article'=>$article])}}" class="btn btn-link">AutoLink</a>
    @if ($article->pin)
        <a href="{{route('article.pin',['article'=>$article])}}" class="btn btn-link">Pin <i class="fas fa-heart"></i></a>
    @else
        <a href="{{route('article.pin',['article'=>$article])}}" class="btn btn-link">Pin <i class="far fa-heart"></i></a>
    @endif
@endsection
@section('content')
<h1>{{$article->title}}</h1>
<h2>{{$article->summary}}</h2>

<div class="nav-tabs-boxed">
    <ul class="nav nav-tabs" role="tablist">
        @if($article->description)
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#articleContent" role="tab" aria-controls="articleContent">Description</a>
            </li>
        @endif
        @if ($article->statblock)
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#statblock" role="tab" aria-controls="profile">Stat Block</a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#home-1" role="tab" aria-controls="home">Specific Relations</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab" aria-controls="profile">General</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#messages-1" role="tab" aria-controls="messages">Graph</a>
        </li>
    </ul>
    <div class="tab-content">
        @if($article->description)
            <div class="tab-pane" id="articleContent" role="tabpanel">
                @if($article->imageurl)
                    <span class="col-4 float-left">
                        <img src="{{$article->imageurl}}" class="img-fluid"/>
                    </span>
                @endif
                {!!$article->description!!}
            </div>
        @endif
        <div class="tab-pane" id="home-1" role="tabpanel">
            @includeif('article.custom_index.' . $article->concept)
        </div>
        <div class="tab-pane" id="statblock">
            {!!$article->statblockRendered!!}
        </div>
        <div class="tab-pane" id="profile-1" role="tabpanel">
            @includeif('article.custom_index.general')
        </div>
        <div class="tab-pane" id="messages-1" role="tabpanel">
            <div id="inner-details"></div>
            <div id ="infovis" style="height:75vh; background:black; overflow:hidden; "></div>
            <script>
            var json = {!!json_encode($graph)!!};
            </script>
            <script src="{{asset('js/test.js')}}"></script>
        </div>
    </div>
</div>

@push('scripts')
<script>
$('.nav-tabs li:first-child a').tab('show')
</script>
@endpush

@endsection

@section('sidebar')
    <ul class="list-group list-group-flush">
        @foreach($article->forwardConnections as $connection)
        <li class="list-group-item list-group-item-action flex-column align-items-start">
            <small class="mb-1 d-flex w-100 justify-content-between">{{$connection->pivot->relationship}}
                <a class="ml-auto" href="{{route('connection.edit', ['connection'=>$connection->pivot])}}" ><i class="fas fa-pencil"></i></a>
            </small>
            <a class="w-100 article-link" href="{{route('article.show', ['article'=>$connection])}}" data-article-id="{{$connection->id}}">
                <h5 class="mb-1">{{$connection->title}}</h5>
                <small>{{$connection->summary}}</small>
            </a>
        </li>

        @endforeach
        @foreach($article->reverseConnections as $connection)
        <li class="list-group-item list-group-item-action flex-column align-items-start">
            <small class="mb-1 d-flex w-100 justify-content-between">{{substr($connection->pivot->relationship,0,-3)}}
                <a class="ml-auto" href="{{route('connection.edit', ['connection'=>$connection->pivot])}}"><i class="fas fa-pencil"></i></a>
            </small>
            <a class="w-100 article-link" href="{{route('article.show', ['article'=>$connection])}}" data-article-id="{{$connection->id}}">
                <h5 class="mb-1">{{$connection->title}}</h5>
                <small>{{$connection->summary}}</small>
            </a>
        </li>
        @endforeach
    </ul>
    
@endsection


@push('scripts')
<script>
var articles = {!!$articles!!};
function getRegExp(name2) {
    var b = /\b/;
    var wordbegin = new RegExp(b.source + escapeRegExp(name2)).test(name2);
    var wordend = new RegExp(escapeRegExp(name2) + b.source).test(name2);
    wordbegin = wordbegin ? /\b/ : new RegExp();
    wordend = wordend ? /\b/ : new RegExp();
    var re = new RegExp(wordbegin.source + escapeRegExp(name2) + wordend.source);
    return re;
}
function createAutoLinksRaw(rawText, arr) {
    var desc = rawText;
    if (!arr) {
        return desc;
    }

    arr = arr.sort(function(a, b){
    // ASC  -> a.length - b.length
    // DESC -> b.length - a.length
    return b.name.length - a.name.length;
    });

    var map = {};
    var thisUri = window.location.href;

    for (var i = 0; i < arr.length; i++) {
        var name = arr[i].name;
        var thingUri =  arr[i].uri;
        if (thingUri !== thisUri) {
            var tempLink = getLinkKey(i);
            var re = getRegExp(name);
            var tempdesc = desc.replace(re, tempLink);
            if (tempdesc !== desc) {
                map[tempLink] = '<a class="text-success article-link" href="' + thingUri + '" data-article-id="'+arr[i].id +'">' + name + ' <i class="fas fa-project-diagram"></i></a>';
                desc = tempdesc;
            }
        }
    }
    console.log(map);
   // return desc;
    for (var key in map) {
        
        if (map.hasOwnProperty(key)) {
            var val = map[key];
            
            desc = desc.replace(key, val);
        }
    }
    return desc;
}
function escapeRegExp(string) {
    return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
}
function getLinkKey(i) {
    return '=LINK' + i + 'LINK=';
}

function createDiceRollLinks(html) {
    if (typeof html ==='undefined')
    {
        return '';
    }
    let reg =  /[0-9]+d[0-9]+(?:\s*\+\s*[0-9]+)?/g
    html = html.replace(reg,'<a class="diceRoll" onclick="rollDice(\'\$&\')">\$& <i class="fas fa-dice text-danger"></i></a>')
    return html;
}

function createExternalLinks() {
    $('#articleContent').find('a').each(function(i,e){
        let url = $(e).attr('href');
        if(url.startsWith('http://1')){
            return;
        }
        if(url.startsWith('http://localhost')){
            return;
        }
        if(url.startsWith('/')){
            return;
        }
        if(url.startsWith('#'))
        {
            return;
        }
        $(e).attr('target','_blank');
        $(e).append('<i class="fas fa-external-link-alt small"></i>')
    })
}

  createExternalLinks();
$('#articleContent p, #articleContent div, #articleContent li').each(function(i, e) {
  $(e).html(createAutoLinksRaw($(e).html(),articles))
  $(e).html(createDiceRollLinks($(e).html()))
})
$('#statblock').html(createDiceRollLinks($('#statblock').html()))


$(document).on('mouseenter','.article-link', function(event){
    $('.article-link').popover('hide');
    let element = $(event.target);
    if (!element.attr('data-article-id')) {
        return;
    }
    let data = articles.find((o) => { return o['id'] == element.attr('data-article-id') })

//        $.get(element.attr('href') + '/preview').then(function(data){
            console.log(event.target);
            element.popover({
                'placement':'top',
        'html': true,
        'content':data.description,
        'title':data.name + ' - ' + data.summary,
            })
            element.popover('show');
  //      })

});
$(document).on('mouseleave','.article-link', function(event){
    $(event.target).popover('hide');
})

</script>
<script src="{{asset('js/rgraph.js')}}"></script>
@endpush