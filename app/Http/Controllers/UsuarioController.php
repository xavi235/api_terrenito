<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    public function index()
    {
        return Usuario::with('rol')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_usuario' => 'required|string',
            'correo' => 'required|email|unique:usuarios,correo',
            'contraseña' => 'required|string',
            'contacto' => 'required|string',
            'id_rol' => 'required|exists:rols,id_rol'
        ]);

        $usuario = Usuario::create([
            'nombre_usuario' => $request->nombre_usuario,
            'correo' => $request->correo,
            'contraseña' => bcrypt($request->contraseña),
            'contacto' => $request->contacto,
            'id_rol' => $request->id_rol
        ]);

        return response()->json([
            'mensaje' => 'Usuario creado correctamente',
            'usuario' => $usuario
        ], 201);
    }

    public function show($id)
    {
        return Usuario::with('rol')->find($id);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        if ($request->has('nombre_usuario')) {
            $usuario->nombre_usuario = $request->nombre_usuario;
        }
        if ($request->has('correo')) {
            $usuario->correo = $request->correo;
        }
        if ($request->has('contraseña')) {
            $usuario->contraseña = Hash::make($request->contraseña);
        }
        if ($request->has('contacto')) {
            $usuario->contacto = $request->contacto;
        }
        if ($request->has('id_rol')) {
            $usuario->id_rol = $request->id_rol;
        }

        $usuario->save();

        return response()->json(['mensaje' => 'Usuario actualizado correctamente', 'usuario' => $usuario]);
    }

    public function destroy($id)
    {
        Usuario::destroy($id);
        return response()->noContent();
    }
}
