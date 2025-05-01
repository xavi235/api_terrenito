<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rols';
    protected $primaryKey = 'id_rol';

    protected $fillable = ['nombre', 'descripcion'];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_rol');
    }
}