<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public $fillable = [
        'title',
        'summary',
        'description',
        'imageurl',
        'concept',
        'statblock'
    ];


    public function route()
    {
        return route('article.show',['article'=>$this]);
    }

    public function reverseConnections()
    {
        return $this->belongsToMany('App\Article','connections', 'to_id','from_id')->withPivot(['relationship','id']);
    }
    public function forwardConnections()
    {
        return $this->belongsToMany('App\Article','connections', 'from_id','to_id')->withPivot(['relationship','id']);
    }

    public  function getStatblockRenderedAttribute($value)
    {
        $text = $this->statblock;
        $text = preg_replace('/>/s','',$text);
        return app('markdown')->convertToHtml($text);
    }

    public function pin()
    {
        return $this->morphOne('App\Pin', 'pinnable');
    }
    public function conceptModel() {
        return $this->belongsTo(Concept::class, 'concept', 'name');
    }
}
