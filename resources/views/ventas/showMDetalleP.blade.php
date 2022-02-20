@extends('layouts.app' , ['activePage' => 'ventas', 'titlePage' => 'Ventas'])
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Detalles de la Venta de Producto</h3>
                    </div>
                </div>
            </div>

            <!-- Projects table -->

            <div class="row w-100" style="padding-left: 30px">
                @foreach ($detallesVenta as $detalle)

                <div class="card text-center border border-secondary rounded-top " style="height: 250px">
                    {{-- <div class="card-header ">
                        Detalle Nro :{{$detalle->id}}
                    </div> --}}

                    <h4 style="text-align: start; font-size:20px;padding-top:12px"> Detalle Nro : {{$detalle->id}}</h4>
                    <div class="card-body" style="text-align: start">
                        <label for="venta_id"  >Cantidad de Productos</label>
                        <input type="number" class="form-control" name="compra_id" value="{{$detalle->cantidad}}" disabled>

                        <label for="venta_id" >Precio Total</label>
                        <input type="number" class="form-control" name="compra_id" value="{{$detalle->precio_total}}" disabled>

                    </div>
                </div>

                @endforeach
            </div>


            <div class="card-footer border-0">

            </div>
        </div>
    </div>
</div>
@endsection
