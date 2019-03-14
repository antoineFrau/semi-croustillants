<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityCategory extends Model
{
    /**
     * ActivityCategory has many Activity
     * activity_categories.id  ->  activities.category_id
     */
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
}