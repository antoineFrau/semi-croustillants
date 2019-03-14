<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * Activity belongs to many User
     * user_activities.activity_id  ->  activities.id
     */
    public function users()
    {
        return $this->belongsToMany('App\User', "user_activities");
    }

    /**
     * Activity belongs to one ActivityCategory
     * activity.category_id  ->  activity_categories.id
     */
    public function category()
    {
        return $this->belongsTo('App\ActivityCategory', 'category_id');
    }

}