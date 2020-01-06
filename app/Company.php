<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $connection = 'mysqlSystemTables';
    protected $table = 'juridicas';
    protected $primaryKey = 'idboleto';

    function getNameAttribute()
    {
        return $this->razao_social;
    }
}
