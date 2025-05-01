<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function index()
    {
        return Ubicacion::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'direccion_detallada' => 'required',
            'provincia' => 'required'
        ]);

        return Ubicacion::create($request->all());
    }

    public function show($id)
    {
        return Ubicacion::find($id);
    }

    public function update(Request $request, $id)
    {
        $ubicacion = Ubicacion::findOrFail($id);
        $ubicacion->update($request->all());
        return $ubicacion;
    }

    public function destroy($id)
    {
        Ubicacion::destroy($id);
        return response()->noContent();
    }
}