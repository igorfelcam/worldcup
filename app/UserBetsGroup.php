<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBetsGroups extends Model
{
    //
    protected $fillable = [
        'user_id',
        'bets_group_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function bets_groups()
    {
        return $this->belongsTo('App\BetsGroup');
    }
}
