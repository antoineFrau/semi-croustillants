<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Post belongs to one User
     * posts.user_id  ->  users.id
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}