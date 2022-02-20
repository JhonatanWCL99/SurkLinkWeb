@extends('layouts.app', ['activePage' => 'inventarios', 'titlePage' => 'Inventarios'])

@section('content')

<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['pag-inventario-index'])) {
        $_SESSION['pag-inventario-index'] = 0;
    }
?>
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Inventarios</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @can('inventario_create')
                        <a class="btn btn-info" href="{{ route('inventarios.create')  }}">Nuevo Inventario</a>
                        @endcan

                        <table class="table table-striped mt-2">
                            <thead style="background-color:#6777ef">
                                <th style="color:#fff;">ID</th>
                                <th style="color:#fff;">Cantidad Inicial</th>
                                <th style="color:#fff;">Cantidad Actual</th>
                                <th style="color:#fff;">Created_at</th>
                                <th style="color:#fff;">Accciones</th>
                            </thead>
                            <tbody>
                                @foreach ($inventarios as $inventario)
                                <tr>
                                    <td>{{ $inventario->id }}</td>
                                    <td>{{ $inventario->cantidad_inicial }}</td>
                                    <td>{{ $inventario->cantidad_actual }}</td>
                                    <td>{{ $inventario->created_at }}</td>
                                    <td>
                                        @can('inventario_create')
                                        <a href="{{ route('inventarios.edit', $inventario->id) }}" class="btn btn-warning"><i class="material-icons">editar</i></a>
                                        @endcan
                                        @can('inventario_destroy')
                                        <form action="{{ route('inventarios.destroy', $inventario->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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
                            {!! $inventarios->links() !!}
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
                        <span style="color: grey; font-size:18px">Nro. Visitas: <?php echo $_SESSION['pag-inventario-index'] += 1; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
