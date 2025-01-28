<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Cita;

class CitaTest extends TestCase
{
    /** @test */
    public function test_crear_cita()
    {
        $cita = Cita::factory()->create();

        $this->assertDatabaseHas('citas', [
            'fecha' => $cita->fecha,
            'hora' => $cita->hora,
            'paciente_id' => $cita->paciente_id,
            'medico_id' => $cita->medico_id,
        ]);
    }

   
}







