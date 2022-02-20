<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index(){
        $inventarios = Inventario::paginate(5);
        return view('inventarios.index',compact('inventarios'));
    }

    public function create()
    {
        /*  abort_if(Gate::denies('user_create'), 403); */
        /* $servicios = Role::all()->pluck('name', 'id'); */
        return view('inventarios.crear');
    }

    public function store(Request $request)
    {

        $inventario = Inventario::create($request->only('cantidad_inicial', 'cantidad_actual'));
        //return redirect()->route('usuarios.index', $user->id)->with('success', 'Usuario creado correctamente');
        return redirect()->route('inventarios.index');
    }

    public function edit(Inventario $inventario)
    {
        /* abort_if(Gate::denies('user_edit'), 403); */
      /*   $roles = Role::all()->pluck('name', 'id');
        $servicio->load('roles'); */
        return view('inventarios.editar' , compact('inventario'));
    }

    public function update(Request $request, Inventario $inventario)
    {
        $inventario->update($request->only('cantidad_inicial'));
        return redirect()->route('inventarios.index', compact('inventario'));
    }

    public function destroy(Inventario $inventario)
    {
        /*  abort_if(Gate::denies('permission_delete'), 403); */
        $inventario->delete();
        return redirect()->route('inventarios.index');
    }

    public function show(){

    }
}
