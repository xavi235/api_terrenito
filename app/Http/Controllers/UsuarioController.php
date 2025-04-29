<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return Usuario::with('rol')->get();
    }

        public function store(Request $request)
    {
        $request->validate([
            'nombre_usuario' => 'required',
            'correo' => 'required|email|unique:usuarios,correo',
            'contraseña' => 'required|min:8',
            'id_rol' => 'required|exists:roles,id_rol'
        ]);

        $usuario = Usuario::create([
            'nombre_usuario' => $request->nombre_usuario,
            'correo' => $request->correo,
            'contraseña' => bcrypt($request->contraseña),
            'contacto' => $request->contacto,
            'id_rol' => $request->id_rol,
        ]);

        return response()->json($usuario, 201);
    }
    public function show($id)
    {
        return Usuario::with('rol')->find($id);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());
        return $usuario;
    }

    public function destroy($id)
    {
        Usuario::destroy($id);
        return response()->noContent();
    }
}
