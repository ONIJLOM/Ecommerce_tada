<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreProd',
        'cantidad',
        'precio',
        'montoTotal',
        'id_prod',
        'id_notaV',
    ];
}
