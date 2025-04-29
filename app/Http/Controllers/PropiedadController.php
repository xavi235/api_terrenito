<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;

class PropiedadController extends Controller
{
    public function index()
    {
        return Propiedad::with(['imagenes', 'usuario', 'ubicacion', 'tipo'])
            ->where('estado', 1)
            ->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'tamano' => 'nullable|numeric',
            'precio_min' => 'required|numeric',
            'precio_max' => 'required|numeric',
            'zona' => 'required',
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'id_ubicacion' => 'required|exists:ubicacions,id_ubicacion',
            'id_tipo' => 'required|exists:tipo_propiedads,id_tipo',
            'imagenes' => 'required|array',
            'imagenes.*' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $propiedad = Propiedad::create($request->except('imagenes'));

        foreach ($request->file('imagenes') as $imagen) {
            $ruta = $imagen->store('imagenes', 'public');
            $propiedad->imagenes()->create([
                'ruta_imagen' => $ruta
            ]);
        }

        $propiedad->load('imagenes', 'usuario', 'ubicacion', 'tipo');

        return response()->json([
            'mensaje' => 'Propiedad creada correctamente',
            'propiedad' => $propiedad
        ], 201);
    }

    public function show($id)
    {
        $propiedad = Propiedad::with(['imagenes', 'usuario', 'ubicacion', 'tipo'])->find($id);

        if (!$propiedad) {
            return response()->json(['error' => 'Propiedad no encontrada'], 404);
        }

        return response()->json($propiedad);
    }

    public function obtenerPorTipo($nombre_tipo)
    {
        $propiedades = Propiedad::with(['imagenes', 'usuario', 'ubicacion', 'tipo'])
            ->whereHas('tipo', function ($query) use ($nombre_tipo) {
                $query->where('nombre', $nombre_tipo);
            })
            ->where('estado', 1)
            ->get();

        if ($propiedades->isEmpty()) {
            return response()->json(['mensaje' => 'No hay propiedades de tipo ' . $nombre_tipo], 404);
        }

        return response()->json($propiedades);
    }

    public function update(Request $request, $id)
    {
        $validaciones = [];

        if ($request->has('titulo')) {
            $validaciones['titulo'] = 'required';
        }

        if ($request->has('descripcion')) {
            $validaciones['descripcion'] = 'required';
        }

        if ($request->has('tamano')) {
            $validaciones['tamano'] = 'nullable|numeric';
        }

        if ($request->has('precio_min')) {
            $validaciones['precio_min'] = 'required|numeric';
        }

        if ($request->has('precio_max')) {
            $validaciones['precio_max'] = 'required|numeric';
        }

        if ($request->has('zona')) {
            $validaciones['zona'] = 'required';
        }

        $request->validate($validaciones);

        $propiedad = Propiedad::findOrFail($id);

        $propiedad->update($request->only(array_keys($validaciones)));

        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $ruta = $imagen->store('imagenes', 'public');
                $propiedad->imagenes()->create([
                    'ruta_imagen' => $ruta
                ]);
            }
        }

        $propiedad->load('imagenes', 'usuario', 'ubicacion', 'tipo');

        return response()->json([
            'mensaje' => 'Propiedad actualizada correctamente',
            'propiedad' => $propiedad
        ]);
    }


    public function mostrar($id)
    {
        $propiedad = Propiedad::with(['usuario', 'ubicacion', 'tipo', 'imagenes'])->find($id);

        if (!$propiedad) {
            return response()->json(['mensaje' => 'Propiedad no encontrada.'], 404);
        }

        return response()->json($propiedad);
    }

    public function destroy($id)
    {
        $propiedad = Propiedad::findOrFail($id);
        $propiedad->estado = 0;
        $propiedad->save();

        return response()->json(['mensaje' => 'Propiedad desactivada correctamente']);
    }
}

