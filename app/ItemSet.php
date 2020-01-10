<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemSet extends Model
{
    public function user()
    {
        $this->belongsTo('App\BlogPost');
    }
}
