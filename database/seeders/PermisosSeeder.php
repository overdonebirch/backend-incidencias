<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permiso;
class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = config("permissions");

        foreach($permissions as $permission => $actions) {
            foreach($actions as $action) {
                Permiso::create(['name' => "{$permission}.{$action}"]);
            }
        }
    }
}
