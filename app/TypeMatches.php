<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeMatches extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    public function matches_soccers()
    {
        return $this->belongsTo('App\MatchesSoccer');
    }
}
