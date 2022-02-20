@extends('layouts.app', ['activePage' => 'compras', 'titlePage' => 'Compras'])

@section('content')

<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['pag-compra-index'])) {
        $_SESSION['pag-compra-index'] = 0;
    }
?>
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Compras</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @can('compra_create')
                        <a class="btn btn-info" href="{{ route('compras.create')  }}">Nueva Compra</a>
                        @endcan

                        <table class="table table-striped mt-2">
                            <thead style="background-color:#6777ef">
                                <th style="color:#fff;">ID</th>
                                <th style="color:#fff;">Descripcion</th>
                                <th style="color:#fff;">Fecha</th>
                                <th style="color:#fff;">Accciones</th>
                            </thead>
                            <tbody>
                                @foreach ($compras as $compra)
                                <tr>
                                    <td>{{ $compra->id }}</td>
                                    <td>{{ $compra->descripcion }}</td>
                                    <td>{{ $compra->fecha }}</td>
                                    <td>
                                        <a href="{{ route('vDetalleCompra.show', $compra->id) }}" class="btn btn-success"><i class="material-icons">Ver Detalle</i></a>
                                        <a href="{{ route('aDetalleCompra.show', $compra->id) }}" class="btn btn-success"><i class="material-icons">Add Detalle</i></a>
                                    </td>
                                    @endforeach

                                </tr>
                            </tbody>
                        </table>
                        <!-- Centramos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $compras->links() !!}
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
                        <span style="color: grey; font-size:18px">Nro. Visitas: <?php echo $_SESSION['pag-compra-index'] += 1; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
