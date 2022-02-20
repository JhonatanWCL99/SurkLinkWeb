<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    //protected $primaryKey = 'id';
    //public $incrementing = false;
    //public $timestamps = false;

    static $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
    ];

    protected $fillable = [
        'nombre',
        'descripcion',
        'modelo',
        'stock',
        'precio_unitario',
        'inventario_id',
    ];
    public function inventario()
    {
        return $this->belongsTo('App\Models\Inventario', 'inventario_id');
    }

    public static function getProductos()
    {
        $response = DB::table('productos')
            ->select('productos.*')
            ->get();

        return $response;
    }
}
