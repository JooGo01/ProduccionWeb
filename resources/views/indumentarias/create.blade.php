@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Indumentaria</div>
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
                    <form method="post" action="{{ route('indumentarias.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre de la indumentaria</label>
                            <input class="form-control" type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
                            <label for="descripcion">Descripcion de la indumentaria</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" value="{{ old('descripcion') }}"></textarea>
                            <label for="precio">Precio de la indumentaria</label>
                            <input class="form-control" type="number" id="precio" name="precio" value="{{ old('precio') }}">
                            <label for="categoria_id">Seleccione una categoria</label>
                            <select class="formSelectCategoria form-control" id="categoria_id" name="categoria_id">
                                @foreach($categorias as $cat)
                                    <option value="{{$cat -> id}}">{{ $cat-> nombre}}</option>
                                @endforeach
                            </select>
                            <label for="imagen">Subi la imagen de la indumentaria</label>
                            <input type="file" class="form-control" id="imagen" name="imagen">
                        </div>
                        <button type="submit" class="botonCrear btn btn-primary">Crear Indumentaria</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection