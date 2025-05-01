<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = [
        'nombre_usuario',
        'correo',
        'contraseña',
        'contacto',
        'id_rol'
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    public function propiedades()
    {
        return $this->hasMany(Propiedad::class, 'id_usuario');
    }

}