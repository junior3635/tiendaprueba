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
                            <th>Cantidad de compras</th>
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name }}</td>
                                    <td>{{count($user->compras) }}</td>
                                    <td>
                                        <a class="btn btn-success" href="/compras/user/{{$user->id}}" >Ver Compra</a>

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
