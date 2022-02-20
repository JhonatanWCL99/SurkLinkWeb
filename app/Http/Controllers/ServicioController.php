<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ServicioController extends Controller
{
    public function index(){
        abort_if(Gate::denies('servicio_index'), 403);
        $servicios = Servicio::paginate(5);
        return view('servicios.index',compact('servicios'));
    }

    public function create()
    {
        abort_if(Gate::denies('servicio_create'), 403);
        /*  abort_if(Gate::denies('user_create'), 403); */
        /* $servicios = Role::all()->pluck('name', 'id'); */
        return view('servicios.crear');
    }

    public function store(Request $request)
    {

        $servicio = Servicio::create($request->only('nombre', 'precio', 'tipo_servicio', 'duracion_servicio'));
        //return redirect()->route('usuarios.index', $user->id)->with('success', 'Usuario creado correctamente');
        return redirect()->route('servicios.index');
    }

    public function edit(Servicio $servicio)
    {
        abort_if(Gate::denies('servicio_edit'), 403);
        /* abort_if(Gate::denies('user_edit'), 403); */
      /*   $roles = Role::all()->pluck('name', 'id');
        $servicio->load('roles'); */
        return view('servicios.editar' , compact('servicio'));
    }

    public function update(Request $request, Servicio $servicio)
    {
        $servicio->update($request->only('nombre','precio','tipo_servicio','duracion_servicio'));
        return redirect()->route('servicios.index', compact('servicio'));
    }

    public function destroy(Servicio $servicio)
    {
        abort_if(Gate::denies('servicio_destroy'), 403);
        /*  abort_if(Gate::denies('permission_delete'), 403); */
        $servicio->delete();
        return redirect()->route('servicios.index');
    }

    public function show(){

    }
}
