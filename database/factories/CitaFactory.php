<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Medico;

class CitaFactory extends Factory
{
    protected $model = \App\Models\Cita::class;

    public function definition()
    {
        return [
            'fecha' => $this->faker->date,
            'hora' => $this->faker->time,
            'motivo' => $this->faker->sentence,
            'paciente_id' => Paciente::factory(),
            'medico_id' => Medico::factory(),
        ];
    }
}



