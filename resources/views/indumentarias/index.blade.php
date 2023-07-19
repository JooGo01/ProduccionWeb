@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Indice Indumentaria</div>
                @if(Session('status'))
	                <div class="alert alert-success m-4">
		                {{ Session('status') }}
	                </div>
                @endif
                <a href="{{ route('indumentarias.create') }}" class="botonAgregar btn btn-success" role="button" aria-disabled="true">Agregar indumentaria</a>
                <div class="card-body">
                    @if(count($productos) > 0)
                        <ul class="grupoListado list-group">
                            @foreach ($productos as $prod)
                                <li class="listado list-group-item">
                                    <a href="{{ route('indumentarias.show', $prod) }}">
                                        {{$prod->nombre}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="navegadorLinks">
                            {{ $productos->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection