<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // spatie documentation
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'permission_index',
            'permission_create',
            'permission_edit',
            'permission_destroy',

            'role_index',
            'role_create',
            'role_edit',
            'role_destroy',

            'user_index',
            'user_create',
            'user_edit',
            'user_destroy',

            'compra_index',
            'compra_create',


            'inventario_index',
            'inventario_create',
            'inventario_edit',
            'inventario_destroy',

            'producto_index',
            'producto_create',
            'producto_edit',
            'producto_destroy',

            'promocion_index',
            'promocion_create',
            'promocion_edit',
            'promocion_destroy',

            'servicio_index',
            'servicio_create',
            'servicio_edit',
            'servicio_destroy',

            'venta_index',
            'venta_create',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
