@extends('layouts.app')
<!-- comentado debido a que por algun motivo me toma mal el layout y me resetea los href -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel Administrador</div>
                <div class="card-body">
                    <a href="{{ route('categorias.index') }}" class="botonAgregar btn btn-primary" role="button" aria-disabled="true"><i class="bi bi-caret-right-fill"></i>Panel Categoria</a>
                    <a href="{{ route('indumentarias.index') }}" class="botonAgregar btn btn-primary" role="button" aria-disabled="true"><i class="bi bi-caret-right-fill"></i>Panel Indumentaria</a>
                    <a href="{{ route('stocks.index') }}" class="botonAgregar btn btn-primary" role="button" aria-disabled="true"><i class="bi bi-caret-right-fill"></i>Panel Stock</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection