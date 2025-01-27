<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

$user = User::find(1);
$user->assignRole('admin');

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     
    public function run(): void
    {
        
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'secretaria']);
        Role::create(['name' => 'medico']);

        // Crea un usuario admin si no existe
        $user = User::firstOrCreate(
            ['email' => 'admin@prueba.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );

        $user->assignRole('admin');
    }

}
