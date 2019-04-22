<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'profile_image_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Status belongs to one User
     * status.id  ->  users.status_id
     */
    public function status()
    {
        return $this->belongsTo('App\Status', 'status_id');
    }

    /**
     * User has many Activities
     * user_activities.user_id  ->  users.id
     */
    public function activities()
    {
        return $this->belongsToMany('App\Activity', "user_activities");
    }

}