<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetalleCompra extends Model
{
    use HasFactory;
    protected $table = 'detalle_compras';
    //protected $primaryKey = 'id';
    //public $incrementing = false;
    //public $timestamps = false;

    protected $fillable = [
        'cantidad',
        'precio_total',
        'compra_id',
        'producto_id',
    ];

    static $rules = [
        'cantidad' => 'required',
        'precio_total' => 'required',
        'compra_id' => 'required',
        'producto_id' => 'required',
    ];

    public function Compra()
    {
        $this->belongsTo('App\Models\Compra', 'compra_id');
    }

    public function Productos()
    {
        $this->hasOne('App\Models\Producto', 'producto_id');
    }

    public static function getDetalleCompra()
    {
        $response = DB::table('detalle_compras')
            ->select('detalle_compras.*')
            ->get();

        return $response;
    }
}
