<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    protected $fillable = [
        'name'
    ];
    public function user()
    {
        $this->belongsTo('App\User');
    }

    public function items()
    {
        return $this->belongsToMany('App\Item')
        ->withTimestamps();
    }
}
