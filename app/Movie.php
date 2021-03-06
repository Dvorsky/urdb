<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'status', 'rating','user_list_id'
    ];

    public function user_list()
    {
        return $this->belongsTo('App\UserList')->withDefault();
    }
}
