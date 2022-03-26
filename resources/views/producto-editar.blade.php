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


                    <div class="modal-header">
                    <h5 class="modal-title" id="UpdateModalLabel">{{$producto->nombre}}</h5>
                    <form action="/productos/delete/{{$producto->id}}" method="post">
                        @csrf
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                    <form action="/productos/update/{{$producto->id}}" method="post">
                        @csrf
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="producto_id" value="{{$producto->id}}">
                        <div class="input-group mb-3">
                            <label class ="form-control" for="">Nombre</label>
                            <input class ="form-control" required type="text" name="nombre" id="nombre" value="{{$producto->nombre}}">
                        </div>
                        <div class="input-group mb-3">
                            <label class ="form-control" for="">Precio</label>
                            <input class ="form-control" required type="number" name="precio" id="precio" value="{{$producto->precio}}">
                        </div>
                        <div class="input-group mb-3">
                            <label class ="form-control" for="">Impuesto</label>
                            <input class ="form-control" required type="number" name="impuesto" id="impuesto" value="{{$producto->impuesto}}">
                        </div>

                    </div>
                    <div class="modal-footer">
                    <a href="/productos" class="btn btn-secondary" >volver</a>
                    <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
