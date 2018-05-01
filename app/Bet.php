<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bets extends Model
{
    //
    protected $fillable = [
        'user_id',
        'marches_soccer_id',
        'first_team_goals',
        'second_team_goals',
        'score',
        'limit_date'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function matches_soccers()
    {
        return $this->belongsTo('App\MatchesSoccer');
    }
}
