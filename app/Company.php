<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $table = 'company';    

    protected $fillable = array('user_id','mission','knowledge');
}

	/*public function users()
    {
    	return $this->belongsToMany('App\User');
    }

    public function userGroups()
    {
    	return $this->hasMany('App\UserGroup');
    }*/
   
