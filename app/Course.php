<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
    	'name', 'desc', 'user_id_owner', 'category_id'
    ];

    public function users()
    {
    	return $this->hasMany('App\User');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}