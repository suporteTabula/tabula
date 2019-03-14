<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable = [
        'id', 'meta_type', 'meta_description', 'page','page_type', 'meta'
    ];
}
