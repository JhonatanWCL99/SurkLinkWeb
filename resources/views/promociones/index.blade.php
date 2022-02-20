@extends('layouts.app', ['activePage' => 'promociones', 'titlePage' => 'Promociones'])

@section('content')

<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['pag-promocion-index'])) {
        $_SESSION['pag-promocion-index'] = 0;
    }
?>
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Promociones</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @can('promocion_create')
                        <a class="btn btn-info" href="{{ route('promociones.create')  }}">Nuevo Promocion</a>
                        @endcan

                        <table class="table table-striped mt-2">
                            <thead style="background-color:#6777ef">
                                <th style="display: none;">ID</th>
                                <th style="color:#fff;">Tipo Promocion</th>
                                <th style="color:#fff;">Monto</th>
                                <th style="color:#fff;">Fecha Inicio</th>
                                <th style="color:#fff;">Fecha Fin</th>
                                <th style="color:#fff;">Accciones</th>
                            </thead>
                            <tbody>
                                @foreach ($promociones as $promocione)
                                <tr>
                                    <td style="display: none;">{{ $promocione->id }}</td>
                                    <td>{{ $promocione->tipo_promocion }}</td>
                                    <td>{{ $promocione->monto }}</td>
                                    <td>{{ $promocione->fecha_inicio }}</td>
                                    <td>{{ $promocione->fecha_fin }}</td>
                                    <td>
                                        @can('promocion_edit')
                                        <a href="{{ route('promociones.edit', $promocione->id) }}" class="btn btn-warning"><i class="material-icons">editar</i></a>
                                        @endcan
                                        @can('promocion_destroy')
                                        <form action="{{ route('promociones.destroy', $promocione->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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
                            {!! $promociones->links() !!}
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
                        <span style="color: grey; font-size:18px">Nro. Visitas: <?php echo $_SESSION['pag-promocion-index'] += 1; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
