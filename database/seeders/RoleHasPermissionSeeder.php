<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // Admin
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        // Cliente
        $cliente_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->name, 0, 5) != 'user_' &&
                substr($permission->name, 0, 6) != 'venta_' &&
                substr($permission->name, 0, 7) != 'compra_' &&
                substr($permission->name, 0, 11) != 'inventario_' &&
                substr($permission->name, 0, 5) != 'role_' &&
                substr($permission->name, 0, 11) != 'permission_' &&
                $permission->name != 'producto_create' &&
                $permission->name != 'producto_edit' &&
                $permission->name != 'producto_destroy' &&
                $permission->name != 'promocion_create' &&
                $permission->name != 'promocion_edit' &&
                $permission->name != 'promocion_destroy' &&
                $permission->name != 'servicio_create' &&
                $permission->name != 'servicio_edit' &&
                $permission->name != 'servicio_destroy';
        });
        Role::findOrFail(2)->permissions()->sync($cliente_permissions);
    }
}
