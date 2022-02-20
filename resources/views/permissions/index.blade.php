@extends('layouts.app', ['activePage' => 'permissions', 'titlePage' => 'Permisos'])

@section('content')

<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['pag-permission-index'])) {
        $_SESSION['pag-permission-index'] = 0;
    }
?>
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Permisos</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @can('permission_create')
                        <a class="btn btn-info" href="{{ route('permissions.create')  }}">Nuevo Permiso</a>
                        @endcan

                        <table class="table table-striped mt-2">
                            <thead style="background-color:#6777ef">
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Nombre</th>
                                <th style="color:#fff;">Guard</th>
                                <th style="color:#fff;">Created_at</th>
                                <th style="color:#fff;">Accciones</th>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                <tr>
                                    <td style="display: none;">{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->guard_name }}</td>
                                    <td>{{ $permission->created_at }}</td>
                                    <td>
                                        @can('permission_edit')
                                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning"><i class="material-icons">editar</i></a>
                                        @endcan
                                        @can('permission_destroy')
                                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" rel="tooltip">
                                                <i class="material-icons">eliminar</i>
                                            </button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Centramos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $permissions->links() !!}
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
                        <span style="color: grey; font-size:18px">Nro. Visitas: <?php echo $_SESSION['pag-permission-index'] += 1; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
