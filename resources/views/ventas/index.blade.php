@extends('layouts.app', ['activePage' => 'ventas', 'titlePage' => 'Ventas'])

@section('content')

<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['pag-venta-index'])) {
        $_SESSION['pag-venta-index'] = 0;
    }
?>
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Ventas</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-info" href="{{ route('ventas.create')  }}">Nueva Venta</a>

                        <table class="table table-striped mt-2">
                            <thead style="background-color:#6777ef">
                                <th style="color:#fff;">ID</th>
                                <th style="color:#fff;">Descripcion</th>
                                <th style="color:#fff;">Fecha</th>
                                <th style="color:#fff;">Tipo de Venta</th>
                                <th style="color:#fff;">Accciones</th>
                            </thead>
                            <tbody>
                                @foreach ($ventas as $venta)
                                <tr>

                                    <td>{{ $venta->id }}</td>
                                    <td>{{ $venta->descripcion }}</td>
                                    <td>{{ $venta->fecha }}</td>
                                    <td>{{ $venta->tipo_venta }}</td>
                                    <td>
                                        <a @if ($venta->tipo_venta == "Servicio")
                                            href="{{ route('vDetalleVentaS.show', $venta->id) }}"
                                            @else
                                            href="{{ route('vDetalleVentaP.show', $venta->id) }}"
                                            @endif
                                            class="btn btn-success"><i class="material-icons">Ver Detalle</i></a>
                                        <a @if ($venta->tipo_venta == "Servicio")
                                            href="{{ route('aDetalleVentaS.show', $venta->id) }}"
                                            @else
                                            href="{{ route('aDetalleVentaP.show', $venta->id) }}"
                                            @endif
                                            class="btn btn-success"><i class="material-icons">Add Detalle</i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Centramos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $ventas->links() !!}
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
                        <span style="color: grey; font-size:18px">Nro. Visitas: <?php echo $_SESSION['pag-venta-index'] += 1; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
