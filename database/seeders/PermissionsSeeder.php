<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $permissions = config("permissions");

    foreach ($permissions as $permission => $actions) {
        foreach($actions as $action) {
            Permission::create([
                "name" => "{$permission}.{$action}",
                "guard_name" => "api"
            ]);
        }
    }
    }
}
