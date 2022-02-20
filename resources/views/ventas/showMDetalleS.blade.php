@extends('layouts.app' , ['activePage' => 'ventas', 'titlePage' => 'Ventas'])
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Detalles de Alquiler de Servicio</h3>
                    </div>
                </div>
            </div>

            <!-- Projects table -->

            <div class="row w-100" style="padding-left: 30px">
                @foreach ($detallesServicio as $detalle)

                <div class="card text-center border border-secondary rounded-top " style="height: 270px">
                    {{-- <div class="card-header ">
                        Detalle Nro :{{$detalle->id}}
                    </div> --}}

                    <h4 style="text-align: start; font-size:20px;padding-top:12px"> Detalle Nro : {{$detalle->id}}</h4>
                    <div class="card-body" style="text-align: start">
                        <label for="fecha_inicio"  >Fecha Inicio</label>
                        <input type="date" class="form-control" name="fecha_inicio" value="{{$detalle->fecha_inicio}}" disabled>

                        <label for="fecha_fin" >Fecha Fin</label>
                        <input type="date" class="form-control" name="fecha_fin" value="{{$detalle->fecha_fin}}" disabled>

                        <label for="precio_total" >Fecha Fin</label>
                        <input type="number" class="form-control" name="precio_total" value="{{$detalle->precio_total}}" disabled>

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
