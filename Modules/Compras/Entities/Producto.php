<?php

namespace Modules\Compras\Entities;


use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{


    protected $table = 'compras__productos';
    protected $fillable = ["descripcion","marca"];
}
