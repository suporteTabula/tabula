<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    public function users()
    {
    	return $this->belongsToMany('App\User');
    }

    public function leader()
    {
    	return $this->belongsTo('App\User');
    }
}
