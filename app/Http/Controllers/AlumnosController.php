<?php

namespace App\Http\Controllers;

use App\Models\alumnos;
use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    public function index()
    {
        $alumnos = alumnos::all();
        return $alumnos;
    }

    public function show($id)
    {
        $alumnos = alumnos::find($id);

        if (!$alumnos) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($alumnos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'email' => 'required|email|unique:alumnos', 
        ]);

        $alumnos = new alumnos();
        $alumnos->nombre = $request->input('nombre');
        $alumnos->apellido = $request->input('apellido');
        $alumnos->direccion = $request->input('direccion');
        $alumnos->email = $request->input('email');
        $alumnos->save();

        return response()->json(['message' => 'Alumno creado con éxito'], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'email' => 'required|email|unique:alumnos', 
        ]);

        $alumnos = alumnos::find($id);

        if (!$alumnos) {
            return response()->json(['message' => 'Alumno no encontrado'], 404);
        }

        $alumnos->nombre = $request->input('nombre');
        $alumnos->apellido = $request->input('apellido');
        $alumnos->direccion = $request->input('direccion');
        $alumnos->email = $request->input('email');
        $alumnos->save();

        return response()->json(['message' => 'Alumno actualizado con éxito'], 200);
    }

    public function destroy($id)
    {
        $alumnos = alumno::find($id);

        if (!$alumnos) {
            return response()->json(['message' => 'Alumno no encontrado'], 404);
        }

        alumno::destroy($id);

        return response()->json(['message' => 'Alumno eliminado con éxito'], 200);
    }
}
