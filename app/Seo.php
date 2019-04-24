<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable = [
        'id', 'meta_type', 'meta_description', 'page','page_type', 'meta'
    ];

    public function pages()
    {
    	if ($this->page_type == 'category') {
    		return $this->belongsTo('App\Category', 'page');
    	}

    	return $this->belongsTo('App\Course', 'page');
    }
}
