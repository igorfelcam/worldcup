<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitations extends Model
{
    //
    protected $fillable = [
        'user_id',
        'bets_group_id',
        'notify'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function bets_groups()
    {
        return $this->belongsTo('App\BetsGroup');
    }
}
