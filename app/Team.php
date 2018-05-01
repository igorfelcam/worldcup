<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    public function matches_soccers()
    {
        return $this->hasMany('App\MatchesSoccer');
    }
}
