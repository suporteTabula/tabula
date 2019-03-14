<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'user_id', 'answer_first', 'answer_second', 'answer_third',
    ];

     public function user()
    {
        return $this->belongsTo('App\User');
    }
}
