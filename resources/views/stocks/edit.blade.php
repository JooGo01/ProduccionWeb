@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Indumentaria</div>
                @if(count($errors) > 0)
                    <div class="alert alert-danger"> 
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form method="post" action="{{ route('stocks.update', $stock)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <p class="card-text">Indumentaria: {{ $producto->nombre }} <br> Talle: {{ $talle->talla}}</p>
                            <label for="cantidad">Cantidad de stock</label>
                            <input class="form-control" type="number" min="1" max="999999" id="cantidad" name="cantidad" value="{{ $stock->cantidad }}">
                        </div>
                        <button type="submit" class="botonCrear btn btn-primary">Editar Indumentaria</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection