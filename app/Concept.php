<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{
    //
    public function connectionTypes()
    {
        return $this->belongsToMany('App\\ConnectionType', 'concept_connection_types', 'concept_id', 'connection_type_id');
    }
}
