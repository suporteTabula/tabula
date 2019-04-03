<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $table = 'company';    

    protected $fillable = array('user_id','mission');

    public function user()
    {
        return $this->hasMany('App\User', 'empresa_id');
    }
}