@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Facturas') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <th>id</th>
                            <th>Total Productos</th>
                            <th>Total Impuestos</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            @foreach ($facturas as $factura)

                                <tr>
                                    <td>{{$factura->id}}</td>
                                    <td>{{$factura->total_productos  }}</td>
                                    <td>{{$factura->total_impuestos }}</td>
                                    <td>{{$factura->total }}</td>
                                    <td><a href="/facturas/show/{{$factura->id}}" class="btn btn-primary">Ver</a></td>

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
