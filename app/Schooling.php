<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schooling extends Model
{

	protected $fillable = ['desc'];
	
    public function users()
    {
    	return $this->hasMany('App\User');
    }
}
