<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'nickname', 'email', 'password', 'first_name', 'last_name','sex','occupation','bio', 
        'birthdate', 'website', 'google_plus', 'twitter', 'facebook', 'youtube','state_id','country_id', 'schooling_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id');
    }

    public function state()
    {
        return $this->belongsTo('App\State', 'state_id');
    } 

    public function schooling()
    {
        return $this->belongsTo('App\Schooling', 'schooling_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function userTypes()
    {
        return $this->belongsToMany('App\UserType');
    }

    public function userGroups()
    {
        return $this->belongsToMany('App\UserGroup');
    }

    public function companies()
    {
        return $this->belongsToMany('App\Company');
    }

    public function institution()
    {
        return $this->hasOne('App\UserGroup');
    }
}
