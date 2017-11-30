<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{

	protected $fillable = ['desc'];
    
    public function users()
    {
    	return $this->belongsToMany('App\User');
    }
}
