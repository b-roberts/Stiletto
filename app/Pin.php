<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    /**
     * Get the owning imageable model.
     */
    public function pinnable()
    {
        return $this->morphTo();
    }
}
