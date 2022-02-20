@extends('layouts.app' , ['activePage' => 'servicios', 'titlePage' => 'Servicios'])

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Editar Servicio</h3>
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
                        <form action="{{ route('servicios.update' , $servicio->id) }}" method="post" class="form-horizontal">
                            {{-- {!! Form::model($user, ['method' => 'PATCH','route' => ['usuarios.update', $user->id]]) !!} --}}
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $servicio->nombre)}}">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="precio" class="py-2">Precio</label>
                                        <input type="number" class="form-control" name="precio" value="{{ old('nombre', $servicio->precio)}}">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="tipo_servicio" class="py-2">Tipo de Servicio</label>
                                        <input type="text" class="form-control" name="tipo_servicio" value="{{ old('name', $servicio->tipo_servicio)}}">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="duracion_servicio" class="py-2">Duracion de Servicio</label>
                                        <input type="text" class="form-control" name="duracion_servicio" value="{{ old('name', $servicio->duracion_servicio)}}">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>
                            {{-- {!! Form::close() !!} --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
