<?php

namespace App\Http\Controllers;

use App\Models\matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{

    public function index()
    {
        $matricula = matricula::all();
        return $matricula;
    }

    public function show($id)
    {
        $matricula = matricula::find($id);

        if (!$matricula) {
            return response()->json(['message' => 'Matricula no Encontrada'], 404);
        }

        return response()->json($matricula);
    }


    public function store(Request $request)
    {
        $request->validate([
            'alumno_id' => 'required',
            'materia_id' => 'required',
        ]);

        $matricula = new matricula();
        $matricula->nombre = $request->input('alumno_id');
        $matricula->apellido = $request->input('materia_id');
        $matricula->save();

        return response()->json(['message' => 'Matricula creado con éxito'], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alumno_id' => 'required',
            'materia_id' => 'required',
        ]);

        $matricula = matricula::find($id);

        if (!$matricula) {
            return response()->json(['message' => 'Matricula no encontrado'], 404);
        }

        $matricula->alumno_id = $request->input('alumno_id');
        $matricula->materia_id = $request->input('materia_id');
        $matricula->save();

        return response()->json(['message' => 'Matricula actualizado con éxito'], 200);
    }

    public function destroy($id)
    {
        $matricula = matricula::find($id);

        if (!$matricula) {
            return response()->json(['message' => 'Matricula no encontrado'], 404);
        }

        matricula::destroy($id);

        return response()->json(['message' => 'Matricula eliminado con éxito'], 200);
    }
}
