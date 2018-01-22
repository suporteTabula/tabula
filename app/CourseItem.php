<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseItem extends Model
{
	protected $fillable = ['name','desc', 'course_item_group_id', 'course_item_types_id'];
    public function course_item_type()
    {
    	return $this->belongsTo('App\CourseItemType', 'course_item_types_id');
    }

    public function course_item_group()
    {
    	return $this->belongsTo('App\CourseItemGroup', 'course_item_group_id');
    }

    public function course_item_options()
    {
    	return $this->hasMany('App\CourseItemOption', 'course_items_id');
    }
}
