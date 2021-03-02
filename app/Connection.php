<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    //

    public function from()
    {
        return $this->belongsTo('App\\Article', 'from_id','id');
    }
    public function to()
    {
        return $this->belongsTo('App\\Article', 'to_id','id');
    }
}
