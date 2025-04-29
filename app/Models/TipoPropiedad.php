<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPropiedad extends Model
{
    protected $table = 'tipo_propiedads';
    protected $primaryKey = 'id_tipo';

    protected $fillable = ['nombre'];

    public function propiedades()
    {
        return $this->hasMany(Propiedad::class, 'id_tipo');
    }
}
