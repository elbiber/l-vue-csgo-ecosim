<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function sets()
    {
        return $this->belongsToMany(Set::class);
    }
}
