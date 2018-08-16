<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseItemOption extends Model
{
	protected $fillable = ['desc', 'course_items_id', 'checked'];
    
    public function course_item()
    {
    	return $this->belongsTo('App\CourseItem', 'course_items_id');
    }

    public function users()
    {
    	return $this->belongToMany('App\User');
    }
}
