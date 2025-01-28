<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_cerrar_sesion()
    {
        // Crea un usuario simulado
        $user = User::factory()->create();

        // Simula que el usuario inicia sesión
        $this->actingAs($user);

        // Envía una solicitud POST a la ruta de logout
        $response = $this->post('/logout');

        // Verifica la redirección a la página de login
        $response->assertRedirect('/login');

        // Comprueba que no hay usuarios autenticados
        $this->assertGuest();
    }
}
