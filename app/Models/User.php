<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'ci',
        'email',
        'password',
        'telefono',
        'tipo_usuario',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getUsuarios()
    {
        $response = DB::table('users')
            ->select('users.*')
            ->get();

        return $response;
    }

    public static function getProveedores()
    {
        $response = DB::table('users')
            ->where('users.tipo_usuario', '=', 'P')
            ->select('users.*')
            ->get();

        return $response;
    }

    public static function getClientes()
    {
        $response = DB::table('users')
            ->where('users.tipo_usuario', '=', 'P')
            ->select('users.*')
            ->get();

        return $response;
    }

    public static function getEmpleados()
    {
        $response = DB::table('users')
            ->where('users.tipo_usuario', '=', 'E')
            ->select('users.*')
            ->get();

        return $response;
    }

    public static function storeUsuario($request)
    {
        $request->tipo_usuario = 'C';
        $usuario = DB::table('users')->insert([
            'ci' => $request->ci,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'telefono' => $request->telefono,
            'tipo_usuario' => $request->tipo_usuario
        ]);
        return $usuario;
    }

    public static function getUserId($id)
    {
        $response = DB::table('users')
            ->where('users.id', '=', $id)
            ->select('users.*')
            ->get();

        return $response;
    }
}
