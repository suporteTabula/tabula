<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $table = 'blog_posts';    

    protected $fillable = [
		'user_id', 'category_id', 'keywords', 'meta_title', 'meta_description', 'title', 'content', 'thumbnail'
	];

	public function comments()
	{
		return $this->hasMany('App\BlogComment', 'id');
	}

	public function category()
	{
		return $this->hasOne('App\BlogCategory', 'id');
	}

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	}
}
