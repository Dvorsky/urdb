<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }

    public function movies()
    {
        return $this->hasMany('App\Movie', 'list_id', 'id');
    }
}
