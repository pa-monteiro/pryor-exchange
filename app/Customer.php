<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $connection = 'mysqlSystemTables';
    protected $table = 'fisicas';
    protected $primaryKey = 'idboleto';

    function getNameAttribute()
    {
        return $this->nome_completo;
    }
}
