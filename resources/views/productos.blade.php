@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(!empty($successMsg))
            <div class="alert alert-success"> {{ $successMsg }}</div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->admin == true)
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearModal">Crear</button>
                    @endif


                    <table class="table">
                        <thead>
                            <th>id</th>
                            <th>nombre</th>
                            <th>precio</th>
                            <th>accion</th>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{$producto->id}}</td>
                                    <td>{{$producto->nombre}}</td>
                                    <td>{{$producto->precio}}</td>
                                    <td>
                                        <button class="btn btn-success" onclick="comprar({{$producto->id}})" data-bs-toggle="modal" data-bs-target="#exampleModal" >Comprar</button>
                                        @if (Auth::user()->admin == true)
                                        <a class="btn btn-warning" href="productos/edit/{{ $producto->id }}">Editar</a>
                                        @endif


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/productos/comprar" method="post">
                            @csrf
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <input type="hidden" name="producto_id" id="producto_id">
                            <div class="input-group mb-3">
                                <label class ="form-control" for="">Ingrese cantidad</label>
                                <input class ="form-control" required type="number" name="cantidad" id="cantidad">
                            </div>

                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Comprar</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/productos/store/" method="post">
                            @csrf
                        <div class="modal-header">
                        <h5 class="modal-title" id="crearModalLabel">Crear Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="input-group mb-3">
                                <label class ="form-control" for="">Nombre</label>
                                <input class ="form-control" required type="text" required name="nombre" id="nombre">
                            </div>
                            <div class="input-group mb-3">
                                <label class ="form-control" for="">Precio</label>
                                <input class ="form-control" required type="number" required name="precio" id="precio">
                            </div>
                            <div class="input-group mb-3">
                                <label class ="form-control" for="">Impuesto</label>
                                <input class ="form-control" required type="number" required name="impuesto" id="impuesto">
                            </div>

                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Crear</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

<script>
    function comprar(valor) {
        document.getElementById("producto_id").value = '';
        document.getElementById("producto_id").value = valor;
    }
</script>
