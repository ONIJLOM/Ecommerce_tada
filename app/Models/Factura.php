<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'nit_empresa',
        'nit_cliente',
        'nombre',
        'fecha',
        'hora', 
        'montoTotal',
        'pago',
        'cambio',
        'id_cliente',
    ];
}
