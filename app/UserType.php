<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{

	protected $fillable = ['type_name'];
    
    public function users()
    {
    	return $this->hasMany('App\User');
    }
}
