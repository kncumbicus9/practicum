<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Medico;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditarCitaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_editar_cita()
    {
        // Crear y autenticar un usuario
        $usuario = User::factory()->create(['email' => 'kcumbicus@prueba.com']);
        $usuario->assignRole('admin');
        $this->actingAs($usuario);

        $cita = Cita::factory()->create();

        $paciente = Paciente::factory()->create();
        $medico = Medico::factory()->create();

        $datosActualizados = [
            'paciente_id' => $paciente->id,
            'medico_id' => $medico->id,
            'fecha' => '2025-02-01',
            'hora' => '15:00',
            'estado' => 'confirmada',
        ];

        $response = $this->put(route('citas.update', $cita->id), $datosActualizados);

        $response->assertStatus(200);

        $this->assertDatabaseHas('citas', [
            'id' => $cita->id,
            'fecha' => '2025-02-01',
            'hora' => '15:00',
            'estado' => 'confirmada',
        ]);
        
        
    }
}

