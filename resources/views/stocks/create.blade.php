@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Stock</div>
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
                    <form method="post" action="{{ route('stocks.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="producto">Seleccione una indumentaria</label>
                            <select class="formSelectCategoria form-control" id="producto" name="producto">
                                @foreach($productos as $prod)
                                    <option value="{{$prod -> id}}">{{ $prod-> nombre}}</option>
                                @endforeach
                            </select>
                            <label for="talle">Seleccione una talla</label>
                            <select class="formSelectCategoria form-control" id="talle" name="talle">
                                @foreach($talles as $ta)
                                    <option value="{{$ta -> id}}">{{ $ta-> talla}}</option>
                                @endforeach
                            </select>
                            <label for="cantidad">Cantidad de stock</label>
                            <input class="form-control" type="number" min="1" max="999999" id="cantidad" name="cantidad" value="{{ old('cantidad') }}">
                        </div>
                        <button type="submit" class="botonCrear btn btn-primary">Crear Stock</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection