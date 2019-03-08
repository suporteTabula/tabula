<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupom extends Model
{
    protected $fillable = [
    	'tipo_cupom', 'valor_cupom', 'expira_cupom', 'limite_cupom', 'desc_cupom', 'curso_id', 'cod_cupom', 'user_id',
    ];
}
