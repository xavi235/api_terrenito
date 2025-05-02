<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Imagen extends Model
{
    use HasFactory;

    // 👇 AÑADE esta línea para usar la tabla correcta
    protected $table = 'imagenes';

    protected $primaryKey = 'id_imagen';

    protected $fillable = [
        'ruta_imagen',
        'id_propiedad',
    ];

    protected $appends = ['url'];

    public function propiedad()
    {
        return $this->belongsTo(Propiedad::class, 'id_propiedad', 'id_propiedad');
    }

    // Devuelve la URL completa de la imagen
    public function getUrlAttribute()
    {
        return asset('storage/' . $this->ruta_imagen);
    }
}
