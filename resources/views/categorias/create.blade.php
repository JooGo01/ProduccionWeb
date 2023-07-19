@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Categoria</div>
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
                    <form method="post" action="{{ route('categorias.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre de categoria</label>
                            <input class="form-control" type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
                            <label for="descripcion">Descripcion de categoria</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" value="{{ old('descripcion') }}"></textarea>
                        </div>
                        <button type="submit" class="botonCrear btn btn-primary">Crear Categoria</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection