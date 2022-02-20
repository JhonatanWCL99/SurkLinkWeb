<?php

namespace App\Http\Controllers;

use App\Models\DetalleServicio;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Promocion;
use App\Models\Servicio;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VentaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('venta_index'), 403);
        $ventas = Venta::paginate(5);
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
         abort_if(Gate::denies('venta_create'), 403);
        /* $servicios = Role::all()->pluck('name', 'id'); */
        $clientes = User::where('tipo_usuario', 'C')->get();
        $promociones = Promocion::all();
        //dd($clientes);
        return view('ventas.crear', compact('clientes', 'promociones'));
    }

    public function store(Request $request)
    {
        $cliente = User::where('name', $request['nombre_cliente'])->first();
        $promocion = Promocion::where('tipo_promocion', $request['promocion_nombre'])->first();
        $venta = Venta::create($request->only('descripcion', 'fecha', 'tipo_venta') + [
            'usuario_id' => $cliente->id,
            'promocion_id' => $promocion->id
        ]);
        //return redirect()->route('usuarios.index', $user->id)->with('success', 'Usuario creado correctamente');
        return redirect()->route('ventas.index');
    }

    public function showADetalleP(Venta $venta)
    {
        abort_if(Gate::denies('venta_create'), 403);
        $productos = Producto::all();
        return view('ventas.showADetalleP', compact('venta', 'productos'));
    }

    public function storeDetalleP(Request $request)
    {
        abort_if(Gate::denies('venta_create'), 403);
        $ventas = Venta::paginate(5);
        $producto = Producto::where('nombre', $request['producto_nombre'])->first();
        $venta_id = intval($request->venta_id);
        /* dd(intval($producto->id)); */
        $detalleVenta = DetalleVenta::create($request->only('cantidad', 'precio_total') + [
            'venta_id' => $venta_id,
            'producto_id' => $producto->id,
        ]);
        return view('ventas.index',  compact('ventas'));
    }

    public function showVDetalleP(Venta $venta)
    {
        abort_if(Gate::denies('venta_create'), 403);
        $detallesVenta = DetalleVenta::where('venta_id', $venta->id)->get();
        return view('ventas.showMDetalleP', compact('detallesVenta'));
    }

    public function showADetalleS(Venta $venta)
    {
        abort_if(Gate::denies('venta_create'), 403);
        $servicios = Servicio::all();
        return view('ventas.showADetalleS', compact('venta', 'servicios'));
    }

    public function storeDetalleS(Request $request)
    {
        abort_if(Gate::denies('venta_create'), 403);
        $ventas = Venta::paginate(5);
        $servicio = Servicio::where('nombre', $request['servicio_nombre'])->first();
        $venta_id = intval($request->venta_id);
        /* dd(intval($producto->id)); */
        $detalleVenta = DetalleServicio::create($request->only('fecha_inicio', 'fecha_fin','precio_total') + [
            'venta_id' => $venta_id,
            'servicio_id' => $servicio->id,
        ]);
        return view('ventas.index',  compact('ventas'));
    }

    public function showVDetalleS(Venta $venta)
    {
        abort_if(Gate::denies('venta_create'), 403);
        $detallesServicio = DetalleServicio::where('venta_id', $venta->id)->get();
        return view('ventas.showMDetalleS', compact('detallesServicio'));
    }

}
