<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
    	'name', 'desc', 'price', 'user_id_owner', 'category_id', 'requirements', 'interest',
    ];

    public function users()
    {
    	return $this->hasMany('App\User');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function course_item_groups()
    {
        return $this->hasMany('App\CourseItemGroup');
    }

    public function userGroups()
    {
        return $this->belongsToMany('App\UserGroup');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}