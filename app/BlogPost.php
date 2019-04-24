<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $table = 'blog_posts';    

    protected $fillable = [
		'name', 'user_id', 'category_id', 'keywords', 'meta_title', 'meta_description',  'content', 'thumbnail'
	];

	public function comments()
	{
		return $this->hasMany('App\BlogComment', 'id');
	}

	public function category()
	{
		return $this->belongsTo('App\BlogCategory');
	}

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	}
}
