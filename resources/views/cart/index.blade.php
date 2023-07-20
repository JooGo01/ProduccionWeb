@extends('layouts.app')

@section('content')
<h1>Tienda</h1>
<div class="container text-center contenedor-tienda">
    <div class="row align-items-start">
        @foreach ($indumentarias as $producto)
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('storage/' . $producto->imagen)}}" class="card-img-top" alt={{$producto->nombre}}>
                <div class="card-body">
                  <h5 class="card-title">{{$producto->nombre}}</h5>
                  <p class="card-text">{{$producto->descripcion}}</p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Stock Disponible:</li>
                  <li class="list-group-item">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Seleccione talle</option>
                        @foreach ($talles as $talla)
                            <option value={{ $talla->id }}>{{ $talla->talla }}</option>
                        @endforeach
                    </select>
                    </li>
                </ul>
                <div class="card-body">
                    <form action="{{ route('cart.remove') }}" method="POST">
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-minus-fill" viewBox="0 0 16 16">
                                <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM6 7.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1 0-1z"/>
                            </svg>
                            <span>Sacar del carrito</span>
                        </button>
                    </form>
                    @if(count($cartCollection)>0)
                        <form action="{{ route('cart.clear') }}" method="POST">
                            {{ csrf_field() }}
                            <button class="btn btn-secondary btn-md">Borrar Carrito</button> 
                        </form>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script>
    $(document).ready(function () {
        $( "#a-tienda" ).toggleClass("active");
    });
</script>
@endsection