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
        'login', 'email', 'password', 'name', 'sex','occupation','bio', 'avatar','img_avatar', 'interest',
        'birthdate', 'website', 'google_plus', 'twitter', 'facebook', 'youtube','state_id','country_id', 'schooling_id', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        foreach ($this->userTypes()->get() as $types) {
            if($types->desc == 'Admin' || $types->desc == 'Suporte')
            {
                return true;
            }
        }
        return false;
    }

    public function isStudent()
    {
        foreach ($this->userTypes()->get() as $types) {
            if($types->desc == 'Aluno')
            {
                return true;
            }
        }
        return false;
    }

    public function isInstructor()
    {
        foreach($this->userTypes()->get() as $types)
        {
         if ($types->desc == 'Instrutor') {
            return true;
        } 
    }
    return false;
    }

    public function isCompanyManager()
    {
        foreach ($this->userTypes()->get() as $types) {
            if ($types->desc == 'Empresa') {
                return true;
            }
        }
        return true;
    }

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

    public function company()
    {
        return $this->belongsToMany('App\Company');
    }

    public function institution()
    {
        return $this->hasOne('App\UserGroup');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }

    public function itemOptions()
    {
        return $this->belongsToMany('App\CourseItemOption');
    }

    public function items()
    {
        return $this->belongsToMany('App\CourseItem')->withPivot('desc', 'course_item_status_id')->withTimestamps();
    }

    public function teacher()
    {
        return $this->hasOne('App\Teacher');
    }
    public function cupom()
    {
        return $this->belongsToMany('App\Cupom');
    }
}


