<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }

    public function movie()
    {
        return $this->hasMany('App\Movie');
    }
}
