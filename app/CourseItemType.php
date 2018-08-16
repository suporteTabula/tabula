<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseItemType extends Model
{
    public function courseitems()
    {
    	return $this->hasMany('App\CourseItem');
    }
}
