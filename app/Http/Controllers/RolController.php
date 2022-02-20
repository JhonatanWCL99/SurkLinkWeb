<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class RolController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('role_index'), 403);
        $roles = Role::paginate(10);
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        abort_if(Gate::denies('role_create'), 403);
        $permissions = Permission::all()->pluck('name', 'id');
        // dd($permissions);
        return view('roles.crear', compact('permissions'));
    }

    public function store(Request $request)
    {
        $role = Role::create($request->only('name'));

        //$role->permissions()->sync($request->input('permissions', []));
        $role->syncPermissions($request->input('permissions', []));
        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), 403);
        $permissions = Permission::all()->pluck('name', 'id');
        $role->load('permissions');
        // dd($role);
        return view('roles.editar', compact('role','permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->only('name'));
        // $role->permissions()->sync($request->input('permissions', []));
        $role->syncPermissions($request->input('permissions', []));
        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role_delete'), 403);
        $role->delete();
        return redirect()->route('roles.index');
    }
}
