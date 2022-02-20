<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Venta extends Model
{
    use HasFactory;
    protected $table = 'ventas';

    protected $fillable = [
        'descripcion',
        'fecha',
        'tipo_venta',
        'promocion_id',
        'usuario_id',
    ];

    static $rules = [
		'descripcion' => 'required',
		'fecha' => 'required',
		'tipo_venta' => 'required',
    ];

    public function Cliente(){
        $this->belongsTo('App\Models\Usuario','usuario_id');
    }

    public function Promocion(){
        $this->belongsTo('App\Models\Usuario','promocion_id');
    }

    public static function getVentas()
    {
        $response = DB::table('ventas')
        ->select('ventas.*')
        ->get();

        return $response;
    }
}
