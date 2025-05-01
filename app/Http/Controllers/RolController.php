<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        return Rol::all();
    }

    public function store(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'nombre' => 'required|unique:roles|max:255',
            'descripcion' => 'nullable|max:255',
        ]);

        // Crear un nuevo rol
        $rol = Rol::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        // Retornar la respuesta
        return response()->json($rol, 201); // 201 significa que se ha creado correctamente
    }

    public function show($id)
    {
        return Rol::find($id);
    }

    public function update(Request $request, $id)
    {
        $rol = Rol::findOrFail($id);
        $rol->update($request->all());
        return $rol;
    }

    public function destroy($id)
    {
        Rol::destroy($id);
        return response()->noContent();
    }
}