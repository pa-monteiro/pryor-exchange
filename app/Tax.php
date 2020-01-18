<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $fillable = [
        'currency',
        'value',
    ];

    function getFormattedValueAttribute()
    {
        return number_format($this->value, 2, ',', 2);
    }
}
