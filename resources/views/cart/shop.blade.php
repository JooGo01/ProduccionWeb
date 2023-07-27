@extends("layouts.app")
@section("content")
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Compra realizada</h4>
        <p>
            <ul class="list-group">
                @foreach ($cartCollection as $item)
                    <li class="list-group-item">
                        <div class="card" style="width: 18rem;">        
                            @foreach ($indumentarias as $producto)
                                @if(($producto->id)==($item->idproducto))
                                    <div class="col-4">
                                        <div class="card" style="width: 18rem;">
                                            <img src="{{asset('storage/' . $producto->imagen)}}" class="card-img-top" alt={{$producto->nombre}}>
                                            <div class="card-body">
                                                <h5 class="card-title">{{$producto->nombre}}</h5>
                                                <p class="card-text">{{$producto->descripcion}}</p>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Cantidad: {{$item->cantidad}}</li>
                                                <li class="list-group-item">
                                                    @foreach ($talles as $talla)
                                                        @if(($talla->id)==($item->idtalle))
                                                            <h5 class="card-title">{{$talla->talla}}</h5>
                                                        @endif
                                                    @endforeach
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
        </p>
        <hr>
        <p class="mb-0">Muchas gracias por confiar en nuestros productos!</p>
    </div>
    <script>
        $(document).ready(function () {
            $( "#a-carrito" ).toggleClass("active");
        });
    </script>
@endsection