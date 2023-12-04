<?php

namespace App\Http\Controllers;

use App\Models\materias;
use Illuminate\Http\Request;

class materiasController extends Controller
{
    public function index()
    {
        $materias = Materias::all();
        return $materias;
    }

    public function show($id)
    {
        $materias = materias::find($id);

        if (!$materias) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($materias);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_materia' => 'required',
            'descripcion' => 'required',
            'docente_id' => 'required',
        ]);

        $materias = new materias();
        $materias->nombre_materia = $request->input('nombre_materia');
        $materias->descripcion = $request->input('descripcion');
        $materias->docente_id = $request->input('docente_id');
        $materias->save();

        return response()->json(['message' => 'Materia creado con éxito'], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_materia' => 'required',
            'descripcion' => 'required', 
        ]);

        $materias = materias::find($id);

        if (!$materias) {
            return response()->json(['message' => 'Materia no encontrado'], 404);
        }

        $materias->nombre_materia = $request->input('nombre_materia');
        $materias->descripcion = $request->input('descripcion');
        $materias->save();

        return response()->json(['message' => 'Materia actualizado con éxito'], 200);
    }

    public function destroy($id)
    {
        $materias = materias::find($id);

        if (!$materias) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        materias::destroy($id);

        return response()->json(['message' => 'Usuario eliminado con éxito'], 200);
    }
}
