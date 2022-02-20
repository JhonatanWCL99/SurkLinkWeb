@extends('layouts.app' , ['activePage' => 'inventarios', 'titlePage' => 'Inventarios'])

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Editar Inventario</h3>
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
                        <form action="{{ route('productos.update' , $producto->id) }}" method="post" class="form-horizontal">
                            {{-- {!! Form::model($user, ['method' => 'PATCH','route' => ['usuarios.update', $user->id]]) !!} --}}
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $producto->nombre)}}">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion</label>
                                        <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion', $producto->descripcion)}}">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="modelo">Modelo</label>
                                        <input type="text" class="form-control" name="modelo" value="{{ old('modelo', $producto->modelo)}}">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="stock">Stock</label>
                                        <input type="text" class="form-control" name="stock" value="{{ old('stock', $producto->stock)}}">
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
