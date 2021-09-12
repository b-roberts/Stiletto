@extends('layout')
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="#">{{$article->concept}}</a> </li>
<li class="breadcrumb-item active" aria-current="page">{{$article->title}}</li>

@endsection
@section('breadcrumb-menu')
<a href="{{route('article.edit',['article'=>$article])}}">Edit</a>
@endsection
@section('content')
<h1>{{$article->title}}</h1>
<h2>{{$article->summary}}</h2>
<div class="card">
<div class="card-body">
{{Form::model($article, ['route'=>['article.update',$article],'method'=>'put'])}}

<div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    {{Form::text('title',null,['class'=>'form-control'])}}
  </div>


  <div class="form-group">
    <label for="exampleFormControlInput1">Summary</label>
    {{Form::text('summary',null,['class'=>'form-control'])}}
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Image</label>
    {{Form::text('imageurl',null,['class'=>'form-control'])}}
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Concept</label>
    {{Form::select('concept',$concepts,null,['class'=>'form-control'])}}
  </div>
{{Form::textarea('description',null,['id'=>'editor'])}}

<div class="form-group">
    <label for="exampleFormControlInput1">Statblock (Markdown)</label>
{{Form::textarea('statblock',null,['class'=>'form-control'])}}
</div>

{{Form::submit('Save',['class'=>'btn btn-primary'])}}
{{Form::close()}}
</div>
</div>


@endsection

@section('sidebar')
<ul class="nav flex-column">
@foreach($article->forwardConnections as $connection)
  <li class="nav-item">
    <a class="nav-link" href="{{route('article.show', ['article'=>$connection])}}"><small>{{$connection->pivot->relationship}}</small><br />{{$connection->title}} </a>
  </li>
@endforeach
@foreach($article->reverseConnections as $connection)
  <li class="nav-item">
    <a class="nav-link" href="{{route('article.show', ['article'=>$connection])}}"><small>{{substr($connection->pivot->relationship,0,-3)}}</small><br />{{$connection->title}} </a>
  </li>
@endforeach
</ul>
@endsection
@push('scripts')
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script>

CKEDITOR.config.stylesSet="my_styles:{{asset('/js/ckeditor.styles.js')}}";
CKEDITOR.replace( 'editor' , {
        'customConfig': '{{asset('/js/ckeditor.config.js')}}'
} );


CKEDITOR.stylesSet.add( 'my_styles', [
    // Block-level styles
    { name: 'alert-info', element: 'div', styles: { 'class': 'alert alert-info' } },
    { name: 'Red Title' , element: 'h3', styles: { 'color': 'Red' } },

    // Inline styles
    { name: 'text-info', element: 'span', attributes: { 'class': 'text-info' } },
    { name: 'text-danger', element: 'span', attributes: { 'class': 'text-danger' } },
    { name: 'Marker: Yellow', element: 'span', styles: { 'background-color': 'Yellow' } }
] );
</script>
@endpush