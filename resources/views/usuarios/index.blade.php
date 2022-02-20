@extends('layouts.app' , ['activePage' => 'usuarios', 'titlePage' => 'Usuarios'])

@section('content')
<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['pag-usuario-index'])) {
        $_SESSION['pag-usuario-index'] = 0;
    }
?>


<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Usuarios</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @can('user_create')
                        <a class="btn btn-info" href="{{ route('usuarios.create') }}">Nuevo Usuario</a>
                        @endcan

                        <table class="table table-striped mt-2">
                            <thead style="background-color:#6777ef">
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Nombre</th>
                                <th style="color:#fff;">E-mail</th>
                                <th style="color:#fff;">Rol</th>
                                <th style="color:#fff;">Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                <tr>
                                    <td style="display: none;">{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    {{-- <td>
                                      @if(!empty($usuario->getRoleNames()))
                                        @foreach($usuario->getRoleNames() as $rolNombre)
                                          <h5><span class="badge badge-dark">{{ $rolNombre }}</span></h5>
                                    @endforeach
                                    @endif
                                    </td> --}}
                                    <td>
                                        @forelse ($usuario->roles as $role)
                                        <span class="badge badge-info">{{ $role->name }}</span>
                                        @empty
                                        <span class="badge badge-danger">No roles</span>
                                        @endforelse
                                    </td>
                                    <td>
                                        @can('user_edit')
                                        <a class="btn btn-warning" href="{{ route('usuarios.edit',$usuario->id) }}">Editar</a>
                                        @endcan
                                        @can('user_destroy')
                                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" rel="tooltip">
                                                <i class="material-icons">eliminar</i>
                                            </button>
                                        </form>
                                        @endcan

                                        {{-- {!! Form::open(['method' => 'DELETE','route' => ['usuarios.destroy', $usuario->id],'style'=>'display:inline']) !!}
                                          {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                      {!! Form::close() !!} --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Centramos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $usuarios->links() !!}
                        </div>

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
                        <span style="color: grey; font-size:18px">Nro. Visitas: <?php echo $_SESSION['pag-usuario-index'] += 1; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
