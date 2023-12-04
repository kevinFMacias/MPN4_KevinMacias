<?php
namespace Database\Factories;

use App\Models\docente;
use Illuminate\Database\Eloquent\Factories\Factory;

class MateriaFactory extends Factory
{
    public function definition()
    {
        $docentes = docente::all();

        return [
            'nombre_materia' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'docente_id' => $this->faker->randomElement($docentes)->id,
        ];
    }
}
