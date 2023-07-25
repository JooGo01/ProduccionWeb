@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Indice Stocks</div>
                @if(Session('status'))
	                <div class="alert alert-success m-4">
		                {{ Session('status') }}
	                </div>
                @endif
                <a href="{{ route('stocks.create') }}" class="botonAgregar btn btn-success" role="button" aria-disabled="true">Agregar Stock</a>
                <div class="card-body">
                    @if(count($productos) > 0)
                        <ul class="grupoListado list-group">
                            @foreach ($stock as $item)
                                    @foreach ($productos as $prod)
                                        @if (($item->id_indumentaria)==($prod->id))
                                            @foreach ($talles as $talle)
                                                @if (($talle->id)==($item->id_talle))
                                                    <li class="listado list-group-item">
                                                        <a href="{{ route('stocks.show', $item) }}">
                                                            {{$prod->nombre . " - " . $talle->talla . " - " . $item->cantidad}}
                                                        </a>
                                                    </li>
                                                @endif    
                                            @endforeach
                                        @endif
                                @endforeach
                            @endforeach
                        </ul>
                        <div class="navegadorLinks">
                            {{ $stock->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection