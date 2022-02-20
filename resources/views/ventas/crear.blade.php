@extends('layouts.app' , ['activePage' => 'compras', 'titlePage' => 'Compras'])

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Nueva Compra</h3>
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
                            <span class="badge badge-danger">{{ $error }}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        {{-- {!! Form::open(array('route' => 'usuarios.store','method'=>'POST')) !!} --}}
                        <form action="{{ route('ventas.store') }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion" class="py-2">Descripcion</label>
                                        <input type="text" class="form-control" name="descripcion">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="fecha" class="py-2">Fecha</label>
                                        <input type="date" class="form-control" name="fecha">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="tipo_venta">Tipo de Venta</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" name="tipo_venta">
                                            <option>Servicio</option>
                                            <option>Producto</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="nombre_cliente">Nombre del Cliente</label>
                                        <select class="form-control selectpicker" data-style="btn btn-link" name="nombre_cliente">
                                            @foreach ($clientes as $cliente)
                                            <option> {{ $cliente->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="tipo_venta" class="my-3">Seleccione una Promocion</label>
                                        @foreach ($promociones as $promocion)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="promocion_nombre" id="promocion_nombre" value="{{$promocion->tipo_promocion}}" checked>
                                            <label class="form-check-label" for="promocion_nombre">
                                                {{$promocion->tipo_promocion}}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-1 col-md-12  ">
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
