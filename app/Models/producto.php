<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precioU',
        'stock',
        'image',
        'cantMin',
        'estado',
        'id_Peso',
        'id_Tipo',
        'id_Cat'
    ];

    public function getGetImageAttribute(){
        if($this->image){
            return url("storage/$this->image");
        }
    } 

    public function add_stock($cantidad){
        $this->increment('stock', $cantidad);
    }

    public function subtract_stock($cantidad){
        $this->decrement('stock', $cantidad);
    }
}
