<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function itemsets()
    {
        return $this->belongsToMany('App\ItemSet')
        ->withTimestamps();
    }
}
