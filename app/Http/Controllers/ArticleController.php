<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Article;
use Illuminate\Support\Str;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request);
        //
        $articles = Article::orderBy('title')->get();
        $transformer = new \App\Transformers\GraphTransformer;
        $graph = $articles->map(function($article) use ($transformer) {
            return $transformer->transform($article);
        });
        $graph = $transformer->getGraph();
        $conceptArticles = $articles->groupBy('concept');

        return view('article.index', ['conceptArticles'=>$conceptArticles, 'graph'=>$graph]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function concept($concept)
    {
        //
        $articles = Article::where('concept',$concept)->orderBy('title')->get();
        return view('article.concept', [
            'concept'=>$concept,
            'articles'=>$articles]);
    }

    public function unlinked()
    {
        //
        $articles = Article::whereDoesntHave('forwardConnections')->whereDoesntHave('reverseConnections')->orderBy('title')->get();
        return view('article.unlinked', [
            'articles'=>$articles]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $concepts = \App\Concept::get()->pluck('name','name');
        return view('article.create', ['concepts'=>$concepts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article;
        $article->fill($request->all());
        $article->save();
        return redirect(route('article.show',['article'=>$article]))->with('flash_success','saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article = Article::findOrFail($id);
        $articles = Article::orderBy('title')->get()->map(function($e){
            return [
                'id'=>$e->id, 
                'summary'=>$e->summary, 
                'description'=>Str::limit(strip_tags($e->description),800), 
                'name'=>$e->title, 
                'uri'=>route('article.show',['article'=>$e])
            ];
        });

            $transformer = new \App\Transformers\GraphTransformer;
            $graph = [];
            $graph  = $transformer->transform($article);
            $article->forwardConnections->map(function($articlex) use ($transformer) {
                $transformer->transform($articlex);
                $articlex->forwardConnections->map(function($articlex) use ($transformer) {
                    return $transformer->transform($articlex);
                });
                $articlex->reverseConnections->map(function($articlex) use ($transformer) {
                    return $transformer->transform($articlex);
                });
            });
            $article->reverseConnections->map(function($articlex) use ($transformer) {
                $transformer->transform($articlex);
                $articlex->forwardConnections->map(function($articlex) use ($transformer) {
                    return $transformer->transform($articlex);
                });
                $articlex->reverseConnections->map(function($articlex) use ($transformer) {
                    return $transformer->transform($articlex);
                });
            });
            $graph = $transformer->getGraph();


        return view('article.show', ['article'=>$article,'articles'=>$articles,'graph'=>$graph]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $concepts = \App\Concept::get()->pluck('name','name');
        return view('article.edit', ['article'=>$article,'concepts'=>$concepts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function link($id)
    {
        $article = Article::findOrFail($id);
        $articles = Article::get()->map(function($e) {
            return ['id'=>$e->id, 'label'=>"($e->concept) $e->title"];
        })->values();

        $connectionTypes = \App\ConnectionType::orderBy('label')->get()->pluck('label')->toArray();
        $connectionTypes = array_combine($connectionTypes, $connectionTypes);
        foreach ($article->conceptModel->connectionTypes as $relevantType) {
            $connectionTypes[$relevantType->label] = "*" . $relevantType->label;
        }
        asort($connectionTypes);
        return view('article.link', [
            'article'=>$article,
            'articles'=>$articles,
            'connectionTypes'=>$connectionTypes
            ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateLink(Request $request, Article $article)
    {
        //
        if ($request->get('reverse')){
            $article->reverseConnections()->attach($request->get('related'), ['relationship'=>$request->get('relation')]);
        }
        else {
            $article->forwardConnections()->attach($request->get('related'), ['relationship'=>$request->get('relation')]);
        }
        return redirect(route('article.show',['article'=>$article]))->with('flash_success','saved');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $article = Article::findOrFail($id);
        $article->fill($request->all());
        $article->save();
        return redirect(route('article.show',['article'=>$article]))->with('flash_success','saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pin(Article $article)
    {
        if ($article->pin != null) {

            $article->pin()->delete();
            return back();
        }
        $pin = new \App\Pin;
        $article->pin()->save($pin);
        return back();
    }


    public function autocomplete(Request $request)
    {
        $term = $request->get('term','');
        $articles = Article::where('title','like', '%' . $term . '%')
        ->orWhere('summary','like', '%' . $term . '%')
        ->orWhere('description','like', '%' . $term . '%')
        ->get()
        ->map(function($e) {
            return [
                'id'=>$e->id, 
                'label'=>"($e->concept) $e->title", 
                'summary'=>$e->summary,
                'route' => route('article.show', $e)
            ];
        })->values();
        return response()->json($articles);
    }

    public function preview(Article $article)
    {
        return $article;
    }
}
