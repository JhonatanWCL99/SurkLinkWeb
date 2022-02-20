@extends('layouts.app' , ['activePage' => 'promociones', 'titlePage' => 'Promociones'])

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Nueva Promocion</h3>
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
                        <form action="{{ route('promociones.store') }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="tipo_promocion" class="py-2">Nombre de Promocion</label>
                                        <input type="text" class="form-control" name="tipo_promocion">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="monto" class="py-2">Monto</label>
                                        <input type="number" class="form-control" name="monto">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="fecha_inicio" class="py-2">Fecha Inicio de Promocion</label>
                                        <input type="date" class="form-control" name="fecha_inicio">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="fecha_fin" class="py-2">Fecha Fin de Promocion</label>
                                        <input type="date" class="form-control" name="fecha_fin">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
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
