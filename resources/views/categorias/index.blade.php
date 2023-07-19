@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Indice Categorias</div>
                @if(Session('status'))
	                <div class="alert alert-success m-4">
		                {{ Session('status') }}
	                </div>
                @endif
                <a href="{{ route('categorias.create') }}" class="botonAgregar btn btn-success" role="button" aria-disabled="true">Agregar categoria</a>
                <div class="card-body">
                    @if(count($categorias) > 0)
                        <ul class="grupoListado list-group">
                            @foreach ($categorias as $cat)
                                <li class="listado list-group-item">
                                    <a href="{{ route('categorias.show', $cat) }}">
                                        {{$cat->nombre}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="navegadorLinks">
                            {{ $categorias->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection