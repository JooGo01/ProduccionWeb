@extends('layouts.app')

@section('content')
<h1>Tienda</h1>
<div class="container text-center contenedor-tienda">
    <div class="row align-items-start">
        @foreach ($indumentarias as $producto)
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <a href="{{ route('tienda.show', $producto) }}">
                        <img src="{{asset('storage/' . $producto->imagen)}}" class="card-img-top" alt={{$producto->nombre}}>
                        <div class="card-body">
                            <h5 class="card-title">{{$producto->nombre}}</h5>
                            <p class="card-text descripcion-producto">{{$producto->descripcion}}</p>
                        </div>
                    </a>
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