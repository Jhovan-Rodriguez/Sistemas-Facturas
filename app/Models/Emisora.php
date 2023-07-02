<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emisora extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombre',
        'razon_social',
        'correo_contacto',
        'rfc'
    ];

     //Se hacen las conexiones entre las tablas de facturas
     public function facturas(){
         $this->hasMany(Factura::class,'emisora_id');
     }
}
