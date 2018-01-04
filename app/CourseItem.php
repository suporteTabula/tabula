<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseItem extends Model
{
    public function course_item_type()
    {
    	return $this->belongsTo('App\CourseItemType');
    }

    public function course_item_group()
    {
    	return $this->belongsTo('App\CourseItemGroup');
    }
}
