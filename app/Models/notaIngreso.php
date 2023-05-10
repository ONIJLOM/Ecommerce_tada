<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notaIngreso extends Model
{
    use HasFactory;

    protected $fillable = [
        'nro',
        'fecha',
        'hora',
        'cantidad',
        'costoProd',
        'total',
        'id_Emp',
        'id_Prod'
    ];

    public function update_stock($id, $cantidad)
    {
        $producto = Producto::find($id);
        $producto->add_stock($cantidad);
    }
}
