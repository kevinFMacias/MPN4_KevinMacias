<?php

namespace App\Http\Controllers;

use App\Models\docentes;
use Illuminate\Http\Request;

class DocentesController extends Controller
{
    public function index()
    {
        $docentes = docentes::all();
        return $docentes;
    }

    public function show($id)
    {
        $docentes = docentes::find($id);

        if (!$docentes) {
            return response()->json(['message' => 'Docente no encontrado'], 404);
        }

        return response()->json($docentes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'email' => 'required|email|unique:docentes', 
        ]);

        $docentes = new docentes();
        $docentes->nombre = $request->input('nombre');
        $docentes->apellido = $request->input('apellido');
        $docentes->direccion = $request->input('direccion');
        $docentes->email = $request->input('email');

        $docentes->save();

        return response()->json(['message' => 'Docente creado con éxito'], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'email' => 'required|email|unique:docentes',
        ]);

        $docentes = docentes::find($id);

        if (!$docentes) {
            return response()->json(['message' => 'Docente no encontrado'], 404);
        }

        $docentes->nombre = $request->input('nombre');
        $docentes->apellido = $request->input('apellido');
        $docentes->apellido = $request->input('direccion');
        $docentes->email = $request->input('email');
        $docentes->save();

        return response()->json(['message' => 'Docente actualizado con éxito'], 200);
    }

    public function destroy($id)
    {
        $docentes = docentes::find($id);

        if (!$docentes) {
            return response()->json(['message' => 'Docente no encontrado'], 404);
        }

        docentes::destroy($id);

        return response()->json(['message' => 'Docente eliminado con éxito'], 200);
    }
}

