<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Promocion extends Model
{
    use HasFactory;
    protected $table = 'promociones';

    //protected $primaryKey = 'id';
    //public $incrementing = false;
    //public $timestamps = false;

    protected $fillable = [
        'tipo_promocion',
        'monto',
        'fecha_inicio',
        'fecha_fin',
    ];

    public static function getPromociones()
    {
        $response = DB::table('promociones')
            ->select('promociones.*')
            ->orderBy('promociones.id', 'ASC')
            ->get();

        return $response;
    }

    public static function getPromocionId($id_promocion)
    {
        $response = DB::table('promociones')
            ->where('promociones.id', '=', $id_promocion)
            ->select('promociones.*')
            ->get();

        return $response;
    }

    public static function guardarPromocion($request)
    {
        $promocion = DB::table('servicios')->insertGetId([
            'tipo_promocion'        => $request->tipo_promocion,
            'monto'        => $request->monto,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
        ]);

        if ($promocion > 0) { //exitoso
            $response = array(
                'mensaje' => 'Agregado con éxito',
                'ok' => true,
                'id' => $promocion
            );
        } else {
            $response = array(
                'mensaje' => 'No se pudo Agregar',
                'ok' => false
            );
        }
        return $response;
    }

    public static function actualizarPromocion($request)
    {
        $affected = DB::table('promociones')
            ->where('promociones.id', $request->id_promocion)
            ->update([
                'tipo_promocion'        => $request->tipo_promocion,
                'monto'        => $request->monto,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_fin' => $request->fecha_fin,
            ]);
        return $affected;
    }

    public static function eliminarPromocion($id)
    {
        $response = DB::table('promociones')
            ->where('promociones.id', '=', $id)
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
