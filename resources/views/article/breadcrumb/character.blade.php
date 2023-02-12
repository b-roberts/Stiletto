@if($article->forwardConnections->where('pivot.relationship','MEMBER_OF')->count() == 1)
@php 
$parentArticle = $article->forwardConnections->where('pivot.relationship','MEMBER_OF')->first();
@endphp
<li class="breadcrumb-item"><a href="{{route('article.show',['article'=>$parentArticle])}}">{{$parentArticle->title}}</a> </li>
@endif