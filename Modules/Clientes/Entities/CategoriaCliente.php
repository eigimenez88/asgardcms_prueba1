<?php

namespace Modules\Clientes\Entities;

use Illuminate\Database\Eloquent\Model;

class CategoriaCliente extends Model
{

    protected $table = 'clientes__categoriaclientes';
    protected $fillable = ["nombre", "descripcion"];

}
