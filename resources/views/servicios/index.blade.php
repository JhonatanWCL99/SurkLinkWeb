@extends('layouts.app', ['activePage' => 'servicios', 'titlePage' => 'Servicios'])

@section('content')
<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['pag-servicio-index'])) {
        $_SESSION['pag-servicio-index'] = 0;
    }
?>

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Servicios</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @can('servicio_create')
                        <a class="btn btn-info" href="{{ route('servicios.create')  }}">Nuevo Servicio</a>
                        @endcan

                        <table class="table table-striped mt-2">
                            <thead style="background-color:#6777ef">
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Nombre</th>
                                <th style="color:#fff;">Precio</th>
                                <th style="color:#fff;">Tipo Servicio</th>
                                <th style="color:#fff;">Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($servicios as $servicio)
                                <tr>
                                    <td style="display: none;">{{ $servicio->id }}</td>
                                    <td>{{ $servicio->nombre }}</td>
                                    <td>{{ $servicio->precio }}</td>
                                    <td>{{ $servicio->tipo_servicio }}</td>
                                    <td>
                                        @can('servicio_edit')
                                        <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-warning"><i class="material-icons">editar</i></a>
                                        @endcan
                                        @can('servicio_destroy')
                                        <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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
                            {!! $servicios->links() !!}
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
                        <span style="color: grey; font-size:18px">Nro. Visitas: <?php echo $_SESSION['pag-servicio-index'] += 1; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
