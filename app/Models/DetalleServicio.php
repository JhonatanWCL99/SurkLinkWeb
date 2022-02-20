<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetalleServicio extends Model
{
    use HasFactory;
    protected $table = 'detalle_servicios';
    //protected $primaryKey = 'id';
    //public $incrementing = false;
    //public $timestamps = false;

    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'precio_total',
        'venta_id',
        'servicio_id',
    ];

    static $rules = [
        'fecha_inicio' => 'required',
        'fecha_fin' => 'required',
        'precio_total' => 'required',
        'venta_id' => 'required',
        'servicio_id' => 'required',
    ];

    public function Venta()
    {
        $this->belongsTo('App\Models\Venta', 'venta_id');
    }

    public function Servicio()
    {
        $this->hasOne('App\Models\Servicio', 'servicio_id');
    }

    public static function getDetalleServicio()
    {
        $response = DB::table('detalle_servicios')
            ->select('detalle_servicios.*')
            ->get();

        return $response;
    }
}
