<?php

namespace Modules\Clientes\Entities;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes__clientes';
    protected $fillable = ["razon_social", "direccion", "ruc", "email", "fecha_nacimiento"];
}
