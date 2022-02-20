<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;

class UsuarioController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_index'), 403);
        $usuarios = User::paginate(5);
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), 403);
        $roles = Role::all()->pluck('name', 'id');
        return view('usuarios.crear', compact('roles'));
    }

    public function store(UserCreateRequest $request)
    {

        $roles = $request->input('roles', []);

        //dd($roles[0]);
        if($roles[0] == "1"){
            /* $request->tipo_usuario = 'A'; */
            $usuario = User::create($request->only('name', 'ci', 'email', 'telefono')
                + [
                    'password' => bcrypt($request->input('password')),
                    'tipo_usuario' => 'A',
                ]);
        }else{
            /* $request->tipo_usuario = 'C'; */
            $usuario = User::create($request->only('name', 'ci', 'email', 'telefono')
                + [
                    'password' => bcrypt($request->input('password')),
                    'tipo_usuario' => 'C',
                ]);
        }



        $usuario->syncRoles($roles);
        //return redirect()->route('usuarios.index', $user->id)->with('success', 'Usuario creado correctamente');
        return redirect()->route('usuarios.index');
    }

    public function edit(User $usuario)
    {
        abort_if(Gate::denies('user_edit'), 403);
        $roles = Role::all()->pluck('name', 'id');
        $usuario->load('roles');
        return view('usuarios.editar', compact('usuario', 'roles'));
    }

    public function update(Request $request, User $usuario)
    {
        // $user=User::findOrFail($id);
        $data = $request->only('name', 'ci', 'email', 'telefono');
        $password = $request->input('password');
        if ($password) {
            $data['password'] = bcrypt($password);
        }
        $usuario->update($data);

        $roles = $request->input('roles', []);
        $usuario->syncRoles($roles);
        //return redirect()->route('users.show', $user->id)->with('success', 'Usuario actualizado correctamente');
        return redirect()->route('usuarios.index');
    }

    public function destroy(User $usuario)
    {
        abort_if(Gate::denies('user_destroy'), 403);

        /* if (auth()->user()->id == $usuario->id) {
            return redirect()->route('usuarios.index');
        } */

        $usuario->delete();
        //return back()->with('succes', 'Usuario eliminado correctamente');
        return redirect()->route('usuarios.index');
    }

    public function show(){

    }
}
