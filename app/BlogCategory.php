<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
	protected $table = 'blog_categories';    

    protected $fillable = [
		'meta_title', 'meta_description', 'title'
	];

	public function posts()
	{
		return $this->hasMany('App\BlogPost', 'category_id');
	}
}
