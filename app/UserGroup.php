<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{

	protected $fillable = [
		'desc', 'company_id'
	];

    public function users()
    {
    	return $this->belongsToMany('App\User');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}
