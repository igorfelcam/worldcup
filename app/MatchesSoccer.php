<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchesSoccers extends Model
{
    //
    protected $fillable = [
        'type_match_id',
        'first_team_id',
        'second_team_id',
        'first_team_goals',
        'second_team_goals',
        'match_date'
    ];

    public function teams()
    {
        return $this->belongsTo('App\Team');
    }

    public function bets()
    {
        return $this->hasMany('App\Bet');
    }

    public function type_matches()
    {
        return $this->hasOne('App\TypeMatches');
    }
}
