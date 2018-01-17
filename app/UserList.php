<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'user_id', 'type',
    ];

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }

    public function movies()
    {
        return $this->hasMany('App\Movie');
    }
}
