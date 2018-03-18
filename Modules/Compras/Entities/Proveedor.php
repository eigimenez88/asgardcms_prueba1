<?php

namespace Modules\Compras\Entities;


use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    

    protected $table = 'compras__proveedor';
    protected $fillable = ["nombre","direccion","correo_electronico"];
}
