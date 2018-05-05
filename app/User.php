<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        /*'name',*/ 'email', 'password', 'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bets()
    {
        return $this->hasMany('App\Bet');
    }

    public function invitations()
    {
        return $this->hasMany('App\Invitation');
    }

    public function user_bets_groups()
    {
        return $this->hasMany('App\UserBetsGroup');
    }

    public function bets_groups()
    {
        return $this->hasMany('App\BetsGroup');
    }
}
