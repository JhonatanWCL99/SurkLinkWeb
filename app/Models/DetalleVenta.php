<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetalleVenta extends Model
{
    use HasFactory;
    protected $table = 'detalle_ventas';
    //protected $primaryKey = 'id';
    //public $incrementing = false;
    //public $timestamps = false;

    protected $fillable = [
        'cantidad',
        'precio_total',
        'venta_id',
        'producto_id',
    ];

    static $rules = [
        'cantidad' => 'required',
        'precio_total' => 'required',
        'venta_id' => 'required',
        'producto_id' => 'required',
    ];

    public function Venta()
    {
        $this->belongsTo('App\Models\Venta', 'venta_id');
    }

    public function Producto()
    {
        $this->hasOne('App\Models\Producto', 'producto_id');
    }

    public static function getDetalleVenta()
    {
        $response = DB::table('detalle_ventas')
            ->select('detalle_ventas.*')
            ->get();

        return $response;
    }
}
