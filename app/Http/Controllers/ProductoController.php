<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(5);
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        /*  abort_if(Gate::denies('user_create'), 403); */
        /* $servicios = Role::all()->pluck('name', 'id'); */
        $inventarios = Inventario::all();
        return view('productos.crear', compact('inventarios'));
    }

    public function store(Request $request)
    {
        $inventario = Inventario::findOrFail($request['inventario_id']);
        $nuevaCantidaActual=$inventario['cantidad_actual']+$request['stock'];
        $inventario->cantidad_actual = $nuevaCantidaActual;
        $inventario->save();
        $producto = Producto::create($request->only('nombre', 'descripcion','modelo','stock','precio_unitario','inventario_id'));
        //return redirect()->route('usuarios.index', $user->id)->with('success', 'Usuario creado correctamente');
        return redirect()->route('productos.index');
    }

    public function edit(Producto $producto)
    {
        /* abort_if(Gate::denies('user_edit'), 403); */
        /*   $roles = Role::all()->pluck('name', 'id');
        $servicio->load('roles'); */
        return view('productos.editar', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $producto->update($request->only('nombre', 'descripcion','modelo','stock','precio_unitario'));
        return redirect()->route('productos.index', compact('producto'));
    }

    public function destroy(Producto $producto)
    {
        /*  abort_if(Gate::denies('permission_delete'), 403); */
        $producto->delete();
        return redirect()->route('productos.index');
    }

    public function show()
    {
    }
}
