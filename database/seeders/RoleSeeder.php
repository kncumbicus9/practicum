<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles si no existen
        $roles = [
            'admin',
            'secretaria',
            'medico',
            'paciente',
        ];

        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // Asignar roles a los usuarios existentes
        $userRoles = [
            'kcumbicus@prueba.com' => 'admin',
            'paciente@prueba.com' => 'paciente',
            'secretaria@prueba.com' => 'secretaria',
            'medico@prueba.com' => 'medico',
        ];

        foreach ($userRoles as $email => $roleName) {
            $user = User::where('email', $email)->first();

            if ($user) {
                // Asignar el rol al usuario
                $user->assignRole($roleName);
            } else {
                $this->command->warn("Usuario con correo {$email} no encontrado. No se asignó el rol '{$roleName}'.");
            }
        }
    }
}
