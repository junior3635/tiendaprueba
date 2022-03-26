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
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <form action="/compras/generar-factura" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                        <button type="submit" class="btn btn-success">Generar Factura</button>
                    </form>
                    </div>

                    <table class="table">
                        <thead>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Cantidad de productos</th>
                            <th>Precio</th>
                            <th>Impuesto</th>
                        </thead>
                        <tbody>
                            @foreach ($compras as $compra)
                                <tr>
                                    <td>{{$compra->id}}</td>
                                    <td>{{$compra->producto->nombre }}</td>
                                    <td>{{$compra->cantidad }}</td>
                                    <td>{{$compra->producto->precio }}</td>
                                    <td>{{$compra->producto->impuesto }}</td>
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
