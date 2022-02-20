@extends('layouts.app' , ['activePage' => 'ventas', 'titlePage' => 'Ventas'])

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Detalle de Alquiler de Servicio </h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        @if ($errors->any())
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>
                            @foreach ($errors->all() as $error)
                            <span class="badge badge-danger">{{ $error }} </span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <form action="{{ route('storeDVentaS.store') }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="venta_id" class="py-2">Venta Asociada</label>
                                        <input type="number" class="form-control" name="venta_id" value="{{$venta->id}}">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="fecha_inicio" class="py-2">Fecha Inicio</label>
                                        <input type="date" class="form-control" name="fecha_inicio">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="fecha_fin" class="py-2">Fecha Fin</label>
                                        <input type="date" class="form-control" name="fecha_fin">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="precio_total" class="py-2">Precio Total</label>
                                        <input type="number" class="form-control" name="precio_total">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label  class="py-3">Seleccione el Servicio</label>
                                        @foreach ($servicios as $servicio)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="servicio_nombre" id="servicio_nombre" value="{{$servicio->nombre}}" checked>
                                            <label class="form-check-label" for="servicio_nombre">
                                                {{$servicio->nombre}}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-1 col-md-12  py-2 ">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </form>
                        {{-- {!! Form::close() !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
