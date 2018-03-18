<?php

namespace Modules\Compras\Entities;


use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Producto extends Model
{
    use  MediaRelation;

    protected $table = 'compras__productos';
    protected $fillable = ["descripcion","marca"];

    public function getArchivoAttribute()
    {
        return $this->filesByZone('archivo')->first();
    }

}
