<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{

	protected $fillable = [
		'desc', 'user_id'
	];

    public function users()
    {
    	return $this->belongsToMany('App\User');
    }

    public function leader()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
