<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupom extends Model
{
    protected $fillable = [
    	'tipo_cupom', 'valor_cupom', 'expira_cupom', 'active', 'desc_cupom', 'type_id', 'cod_cupom', 'user_id',
    ];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

}
