<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario con permiso de sólo vista
        $user = User::create([
            "name" => "user",
            "email" => "user@gmail.com",
            "password" => Hash::make("123") // Hasheando la contraseña
        ]);
        $user->givePermissionTo('incidencias.view');
        
        // Crear admin con todos los permisos de incidencias
        $admin = User::create([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make("123") // Hasheando la contraseña
        ]);
        $admin->givePermissionTo('incidencias.*');
    }
}