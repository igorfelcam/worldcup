<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BestGroups extends Model
{
    //
    protected $fillable = [
        'user_create_id',
        'name'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function user_bets_groups()
    {
        return $this->hasMany('App\UserBetsGroups');
    }

    public function invitations()
    {
        return $this->hasMany('App\Invitations');
    }
}
