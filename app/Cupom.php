<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupom extends Model
{
    protected $fillable = [
    	'tipoCupom', 'valorCupom', 'expiraCupom', 'limiteCupom', 'descCupom', 'curso_id', 'codCupom', 'user_id',
    ];
}
