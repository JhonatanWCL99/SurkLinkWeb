<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Inventario extends Model
{
    use HasFactory;
    protected $table = 'inventarios';

    //protected $primaryKey = 'id';
    //public $incrementing = false;
    //public $timestamps = false;

    protected $fillable = [
        'cantidad_inicial',
        'cantidad_actual',
    ];

    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'producto_id');
    }

    public static function getInventarios()
    {
        $response = DB::table('inventarios')
            ->select('inventarios.*')
            ->orderBy('inventarios.id', 'ASC')
            ->get();

        return $response;
    }

    public static function getInventarioId($id_inventario)
    {
        $response = DB::table('inventarios')
            ->where('inventarios.id', '=', $id_inventario)
            ->select('inventarios.*')
            ->get();

        return $response;
    }

    public static function guardarInventario($request)
    {
        $inventario = DB::table('inventarios')->insertGetId([
            'cantidad_inicial' => $request->cantidad_inicial,
            'cantidad_actual' => $request->cantidad_actual,
        ]);

        if ($inventario > 0) { //exitoso
            $response = array(
                'mensaje' => 'Agregado con éxito',
                'ok' => true,
                'id' => $inventario
            );
        } else {
            $response = array(
                'mensaje' => 'No se pudo Agregar',
                'ok' => false
            );
        }
        return $response;
    }

    public static function actualizarInventario($request)
    {
        $affected = DB::table('inventarios')
            ->where('inventarios.id', $request->id_inventario)
            ->update([
                'cantidad_actual'=> $request->cantidad_actual,
            ]);
        return $affected;
    }

    public static function eliminarInventario($id)
    {
        $response = DB::table('inventarios')
            ->where('inventarios.id', '=', $id)
            ->delete();

        if ($response == 1) { //exitoso
            $response = array(
                'mensaje' => 'Eliminado con éxito',
                'ok' => true
            );
        } else {
            $response = array(
                'mensaje' => 'No se pudo Eliminar',
                'ok' => false
            );
        }
        return $response;
    }
}
