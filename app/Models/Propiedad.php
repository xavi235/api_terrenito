<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Propiedad extends Model
{
    use HasFactory;

    protected $table = 'propiedads';
    protected $primaryKey = 'id_propiedad';
    public $timestamps = true;
    protected $fillable = [
        'titulo',
        'descripcion',
        'tamano',
        'precio_min',
        'precio_max',
        'zona',
        'estado',
        'Enlace_ubicacion',
        'id_usuario',
        'id_ubicacion',
        'id_tipo'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class, 'id_ubicacion');
    }

    public function tipo()
    {
        return $this->belongsTo(TipoPropiedad::class, 'id_tipo');
    }

    public function imagenes()
    {
        return $this->hasMany(Imagen::class, 'id_propiedad');
    }

}