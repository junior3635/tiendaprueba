@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Factura') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Impuesto</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            @foreach ($factura->compras as $c)
                                <tr>
                                    <td>{{$c->producto->id}}</td>
                                    <td>{{$c->producto->nombre}}</td>
                                    <td>{{$c->producto->precio}}</td>
                                    <td>{{$c->producto->impuesto}}</td>
                                    <td>{{$c->cantidad}}</td>
                                    <td>{{ number_format((($c->cantidad*$c->producto->precio)*$c->producto->impuesto)/100 + ($c->cantidad*$c->producto->precio),2, '.', ',') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr><td>Total Factura:{{$factura->total}}</td></tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
