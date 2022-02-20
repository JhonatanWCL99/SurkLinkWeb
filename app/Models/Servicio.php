<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Servicio extends Model
{
    use HasFactory;
    protected $table = 'servicios';

    //protected $primaryKey = 'id';
    //public $incrementing = false;
    //public $timestamps = false;

    protected $fillable = [
        'nombre',
        'precio',
        'tipo_servicio',
        'duracion_servicio',
    ];

    public static function getServicios()
    {
        $response = DB::table('servicios')
        ->select('servicios.*')
        ->orderBy('servicios.id', 'ASC')
        ->get();

        return $response;
    }

    public static function getServicioId($id_servicio)
    {
        $response = DB::table('servicios')
        ->where('servicios.id', '=', $id_servicio)
        ->select('servicios.*')
        ->get();

        return $response;
    }

    public static function guardarServicio($request)
    {
        $servicio = DB::table('servicios')->insertGetId([
            'nombre'        => $request->nombre,
            'precio'        => $request->precio,
            'tipo_servicio' => $request->tipo_servicio,
            'duracion_servicio' => $request->duracion_servicio,
        ]);

        if ($servicio > 0) { //exitoso
            $response = array(
                'mensaje' => 'Agregado con éxito',
                'ok' => true,
                'id' => $servicio
            );
        }else{
            $response = array(
                'mensaje' => 'No se pudo Agregar',
                'ok' => false
            );
        }
        return $response;
    }

    public static function actualizarServicio($request)
    {
        $affected = DB::table('servicios')
            ->where('servicios.id', $request->id_servicio)
            ->update([
                'nombre'        => $request->nombre,
                'precio'        => $request->precio,
                'tipo_servicio' => $request->tipo_servicio,
                'duracion_servicio' => $request->duracion_servicio,
            ]);
        return $affected;
    }

    public static function eliminarServicio($id)
    {
        $response = DB::table('servicios')
          ->where('servicios.id', '=', $id)
          ->delete();

        if ($response == 1) { //exitoso
            $response = array(
                'mensaje' => 'Eliminado con éxito',
                'ok' => true
            );
        }else{
            $response = array(
                'mensaje' => 'No se pudo Eliminar',
                'ok' => false
            );
        }
        return $response;
    }
}
