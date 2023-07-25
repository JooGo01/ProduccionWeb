@extends('layouts.app')

@section('content')
<h1>Tienda</h1>
<div class="container text-center contenedor-tienda">
    <div class="row align-items-start">
        @foreach ($indumentarias as $producto)
            <div class="col-4">
                <form action="{{ route('cart.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('storage/' . $producto->imagen)}}" class="card-img-top" alt={{$producto->nombre}}>
                        <div class="card-body">
                            <h5 class="card-title">{{$producto->nombre}}</h5>
                            <p class="card-text">{{$producto->descripcion}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Stock Disponible:</li>
                            <li class="list-group-item">
                                <select class="form-select" aria-label="Default select example" name="talle" >
                                    <option selected>Seleccione talle</option>
                                        @foreach ($talles as $talla)
                                            <option value={{ $talla->id }}>{{ $talla->talla }}</option>
                                        @endforeach
                                </select>
                            </li>
                        </ul>
                        <div class="card-body">
                            <input type="hidden" value="{{ $producto->id}}" name="idProducto">
                            <input type="text" value="1" id="cantidad" name="cantidad">
                            <button type="submit" class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-plus-fill" viewBox="0 0 16 16">
                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
                                </svg>
                                <span>Añadir al carrito</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endforeach
    </div>
</div>
<script>
    $(document).ready(function () {
        $( "#a-tienda" ).toggleClass("active");
    });

    const csrfToken=document.head.querySelector("[name~=csrft-token][content]").content;
    document.getElementById('cantidad').addEventListener('change', (e)=>{
        fetch('cantidad',{
            method: 'POST',
            body: JSON-stringify({
                id_indumentaria: e.target.value,
                id_talla: 'ingrese valor'
            })
            header:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        })
    })
</script>
@endsection