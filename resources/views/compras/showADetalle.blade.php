@extends('layouts.app' , ['activePage' => 'compras', 'titlePage' => 'Compras'])

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Detalle de Compra </h3>
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
                        <form action="{{ route('storeDCompra.store') }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="compra_id" class="py-2">Compra Asociada</label>
                                        <input type="number" class="form-control" name="compra_id" value="{{$compra->id}}" >
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="cantidad" class="py-2">Cantidad</label>
                                        <input type="number" class="form-control" name="cantidad">
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
                                <div class="row vh-80 justify-content-around align-items-center">
                                    <div class="col-sm-3">

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                @foreach ($productos as $producto)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="producto_nombre" id="producto_nombre" value="{{$producto->nombre}}" checked>
                                                    <label class="form-check-label" for="producto_nombre">
                                                        {{$producto->nombre}}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="fomr-group">
                                                <p style="color: grey; font-size:15px"> Ó </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <a class="btn btn-success" href="{{ route('productos.create')  }}">Crear un Nuevo Producto</a>
                                            </div>
                                        </div>
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
