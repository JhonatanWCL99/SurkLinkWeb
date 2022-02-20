@extends('layouts.app' , ['activePage' => 'inventarios', 'titlePage' => 'Inventarios'])

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Nuevo Inventario</h3>
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
                        <form action="{{ route('inventarios.store') }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="cantidad_inicial" class="py-2">Cantidad Inicial</label>
                                        <input type="number" class="form-control" name="cantidad_inicial">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="cantidad_actual" class="py-2">Cantidad Actual</label>
                                        <input type="number" class="form-control" name="cantidad_actual">
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
