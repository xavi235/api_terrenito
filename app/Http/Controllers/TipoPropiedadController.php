<?php

namespace App\Http\Controllers;

use App\Models\TipoPropiedad;
use Illuminate\Http\Request;

class TipoPropiedadController extends Controller
{
    public function index()
    {
        return TipoPropiedad::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:tipo_propiedads'
        ]);

        return TipoPropiedad::create($request->all());
    }

    public function show($id)
    {
        return TipoPropiedad::find($id);
    }

    public function update(Request $request, $id)
    {
        $tipoPropiedad = TipoPropiedad::findOrFail($id);
        $tipoPropiedad->update($request->all());
        return $tipoPropiedad;
    }

    public function destroy($id)
    {
        TipoPropiedad::destroy($id);
        return response()->noContent();
    }
}