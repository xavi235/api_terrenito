<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = 'ubicacions';
    protected $primaryKey = 'id_ubicacion';

    protected $fillable = ['direccion_detallada', 'provincia'];

    public function propiedades()
    {
        return $this->hasMany(Propiedad::class, 'id_ubicacion');
    }

}
