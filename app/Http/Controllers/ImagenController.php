<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function index()
    {
        return Imagen::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'ruta_imagen' => 'required|string',
            'id_propiedad' => 'required|exists:propiedads,id_propiedad'
        ]);

        return Imagen::create($request->all());
    }

    public function show($id)
    {
        return Imagen::find($id);
    }

    public function update(Request $request, $id)
    {
        $imagen = Imagen::findOrFail($id);
        $imagen->update($request->all());
        return $imagen;
    }

    public function destroy($id)
    {
        Imagen::destroy($id);
        return response()->noContent();
    }
}
