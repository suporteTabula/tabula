<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['desc'];
    
    public function users()
    {
    	return $this->belongsToMany('App\User');
    }
    
    public function parent()
    {
    	return $this->belongsTo('App\Category', 'category_id_parent');
    }

    public function children()
    {
    	return $this->hasMany('App\Category', 'category_id_parent');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}
