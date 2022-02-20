@extends('layouts.app' , ['activePage' => 'usuarios', 'titlePage' => 'Usuarios'])

@section('content')
<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['pag-usuario-create'])) {
        $_SESSION['pag-usuario-create'] = 0;
    }
?>
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Editar Usuario</h3>
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
                        <form action="{{ route('usuarios.update' , $usuario->id) }}" method="post" class="form-horizontal">
                            {{-- {!! Form::model($user, ['method' => 'PATCH','route' => ['usuarios.update', $user->id]]) !!} --}}
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name', $usuario->name)}}">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="ci">Carnet de Identidad</label>
                                        <input type="number" class="form-control" name="ci" value="{{ old('ci', $usuario->ci)}}">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="email">Correo</label>
                                        <input type="text" class="form-control" name="email" value="{{ old('email', $usuario->email)}}">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input type="password" class="form-control" name="password" placeholder="Ingrese la contraseña sólo en caso de modificarla">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="telefono">Telefono</label>
                                        <input type="number" class="form-control" name="telefono" value="{{ old('telefono', $usuario->telefono)}}">
                                        {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Roles</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="profile">
                                                    <table class="table">
                                                        <tbody>
                                                            @foreach ($roles as $id => $role)
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $id }}" {{ $usuario->roles->contains($id) ? 'checked' : ''}}>
                                                                            <span class="form-check-sign">
                                                                                <span class="check" value=""></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    {{ $role }}
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
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
    <div style="padding-top: 180px">
        <div class="row">
            <div class="col s6 m4 l2 offset-s6 offset-m8 offset-l10">
                <div class="left-align">
                    <div class="card-panel teal">
                        <span style="color: grey; font-size:18px">Nro. Visitas: <?php echo $_SESSION['pag-usuario-create'] += 1; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
