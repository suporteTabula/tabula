<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

	protected $fillable = [
		'name',
		'desc',
        'theme_color',
	];

	public function users()
    {
    	return $this->belongsToMany('App\User');
    }

    public function userGroups()
    {
    	return $this->hasMany('App\UserGroup');
    }
}