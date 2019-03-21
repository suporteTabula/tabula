<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment', 'user_id', 'course_id', 'type_comment', 'comment_parent'];

    public function users()
    {
    	return $this->belongsTo('App\User');
    }
    public function courses()
    {
    	return $this->belongsTo('App\Course');
    }
}
