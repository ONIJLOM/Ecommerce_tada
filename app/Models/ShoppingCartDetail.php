<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreProd',
        'cantidad',
        'precioU',
        'total',
        'cart_id',
        'prod_id',
    ];
}
