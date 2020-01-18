<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $connection = 'mysqlSystemTables';
    protected $table = 'boletos';
    public $fillable = [
        'enviado'
    ];
    protected $primaryKey = 'idboleto';

    protected $dates = [
        'dtVenda'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fisicas()
    {
        return $this->belongsTo(Fisica::class);
    }

    public function juridicas()
    {
        return $this->belongsTo(Juridica::class);
    }
}
