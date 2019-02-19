<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    protected $table = 'stars';    

	protected $fillable = array('id_course','id_user','point');
}
