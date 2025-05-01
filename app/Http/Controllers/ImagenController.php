<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    /**
     * Obtener todas las imágenes.
     */
    public function index()
    {
        return Imagen::all();
    }

    /**
     * Registrar una nueva imagen con su URL completa.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ruta_imagen' => 'required|url',  
            'id_propiedad' => 'required|exists:propiedads,id_propiedad'
        ]);

        $imagen = Imagen::create($request->all());
        return response()->json([
            'mensaje' => 'Imagen registrada correctamente',
            'imagen' => $imagen
        ], 201);
    }

    /**
     * Mostrar los detalles de una imagen específica.
     */
    public function show($id)
    {
        $imagen = Imagen::find($id);
        if (!$imagen) {
            return response()->json(['mensaje' => 'Imagen no encontrada'], 404);
        }

        return $imagen;
    }

    /**
     * Actualizar los datos de una imagen existente.
     */
    public function update(Request $request, $id)
    {
        $imagen = Imagen::findOrFail($id);
        $imagen->update($request->all());

        return response()->json([
            'mensaje' => 'Imagen actualizada correctamente',
            'imagen' => $imagen
        ]);
    }

    /**
     * Eliminar una imagen específica.
     */
    public function destroy($id)
    {
        Imagen::destroy($id);
        return response()->noContent();
    }
}
