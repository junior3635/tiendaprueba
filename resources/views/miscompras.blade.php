@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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
                            <th>Cantidad de productos</th>
                            <th>Precio</th>
                            <th>Impuesto</th>
                            <th>Facturada</th>
                        </thead>
                        <tbody>
                            @foreach ($compras as $compra)
                                <tr>
                                    <td>{{$compra->id}}</td>
                                    <td>{{$compra->producto->nombre }}</td>
                                    <td>{{$compra->cantidad }}</td>
                                    <td>{{$compra->producto->precio }}</td>
                                    <td>{{$compra->producto->impuesto }}</td>
                                    <td>

                                        @if ($compra->facturada == 1)
                                            Facturada
                                        @else
                                            Sin Facturar
                                        @endif
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
