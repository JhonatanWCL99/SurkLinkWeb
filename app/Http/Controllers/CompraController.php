<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::paginate(5);
        return view('compras.index', compact('compras'));
    }

    public function create()
    {
        /*  abort_if(Gate::denies('user_create'), 403); */
        /* $servicios = Role::all()->pluck('name', 'id'); */
        $clientes = User::where('tipo_usuario', 'C')->get();
        $productos = Producto::all();
        //dd($clientes);
        return view('compras.crear', compact('clientes', 'productos'));
    }

    public function store(Request $request)
    {
        //dd($request['nombre_proveedor']);
        $proveedor = User::where('name', $request['nombre_proveedor'])->first();
        /* dd($proveedor); */
        $compra = Compra::create($request->only('descripcion', 'fecha')+[
            'usuario_id' =>$proveedor->id
        ]);

        //return redirect()->route('usuarios.index', $user->id)->with('success', 'Usuario creado correctamente');
        return redirect()->route('compras.index');
    }


    public function showADetalle(Compra $compra)
    {
        $productos = Producto::all();
        return view('compras.showADetalle', compact('compra','productos'));
    }

    public function storeDetalle(Request $request){
        $compras = Compra::paginate(5);
        $producto = Producto::where('nombre',$request['producto_nombre'])->first();
        $compra_id = intval($request->compra_id);
        /* dd(intval($producto->id)); */
        $detalleCompra = DetalleCompra::create($request->only('cantidad', 'precio_total')+[
            'compra_id' => $compra_id,
            'producto_id' => $producto->id,
        ]);
        return view('compras.index',  compact('compras'));
    }

    public function showVDetalle(Compra $compra){
        $detallesCompra = DetalleCompra::where('compra_id',$compra->id)->get();
        return view('compras.showMDetalle',compact('detallesCompra'));
    }
}
