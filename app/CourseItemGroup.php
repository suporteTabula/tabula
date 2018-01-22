<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseItemGroup extends Model
{

	protected $fillable = ['name', 'desc', 'course_id'];
	
    public function course_items()
    {
    	return $this->hasMany('App\CourseItem', 'course_item_group_id');
    }

    public function course()
    {
    	return $this->belongsTo('App\Course');
    }
}
