<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Compra extends Model
{
    use HasFactory;
    protected $table = 'compras';
    //protected $primaryKey = 'id';
    //public $incrementing = false;
    //public $timestamps = false;

    protected $fillable = [
        'descripcion',
        'fecha',
        'usuario_id',
    ];

    static $rules = [
        'descripcion' => 'required',
        'fecha' => 'required',
    ];

    public function Proveedor()
    {
        $this->hasMany('App\Models\Usuario', 'usuario_id');
    }

    public static function getCompras()
    {
        $response = DB::table('compras')
            ->select('compras.*')
            ->get();

        return $response;
    }
}
