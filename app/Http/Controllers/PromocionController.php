<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PromocionController extends Controller
{
    public function index(){
        abort_if(Gate::denies('promocion_index'), 403);
        $promociones = Promocion::paginate(5);
        return view('promociones.index',compact('promociones'));
    }

    public function create()
    {
        abort_if(Gate::denies('promocion_create'), 403);
        /* $servicios = Role::all()->pluck('name', 'id'); */
        return view('promociones.crear');
    }

    public function store(Request $request)
    {

        $promocion = Promocion::create($request->only('tipo_promocion', 'monto','fecha_inicio','fecha_fin'));
        //return redirect()->route('usuarios.index', $user->id)->with('success', 'Usuario creado correctamente');
        return redirect()->route('promociones.index');
    }

    public function edit(Promocion $promocione)
    {
        abort_if(Gate::denies('promocion_edit'), 403);
      /*   $roles = Role::all()->pluck('name', 'id');
        $servicio->load('roles'); */
        return view('promociones.editar' , compact('promocione'));
    }

    public function update(Request $request, Promocion $promocione)
    {
        $promocione->update($request->only('monto' ,'fecha_inicio','fecha_fin'));
        return redirect()->route('promociones.index', compact('promocione'));
    }

    public function destroy(Promocion $promocione)
    {
         abort_if(Gate::denies('promocion_destroy'), 403);
        $promocione->delete();
        return redirect()->route('promociones.index');
    }

    public function show(){

    }
}
