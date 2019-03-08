<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    protected $table = 'blog_comments';    

    protected $fillable = [
		'post_id', 'user_id', 'content'
	];

	public function post()
    {
        return $this->belongsTo('App\BlogPost', 'post_id');
    }
}
