<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupom extends Model
{
    protected $table = 'cupons';
    public $fillable = [
        'cupom',
        'porcentagem',
        'data_fim'
    ];

    public $timestamps = false;
}
