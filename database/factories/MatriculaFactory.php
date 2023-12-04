<?php

namespace Database\Factories;

use App\Models\Matricula;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatriculaFactory extends Factory
{
    public function definition()
    {
        return [
            'alumno_id' => \App\Models\alumno::factory(), 
            'materia_id' => \App\Models\materia::factory(), 
        ];
    }
}
