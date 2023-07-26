@extends('layouts.app')

@section('content')
<h1>Tienda</h1>
<div class="container text-center contenedor-tienda">
    <div class="row align-items-start">
        <div class="col-4">
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('storage/' . $productos->imagen)}}" class="card-img-top" alt={{$productos->nombre}}>
                    <div class="card-body">
                        <h5 class="card-title">{{$productos->nombre}}</h5>
                        <p class="card-text">{{$productos->descripcion}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Stock Disponible: <span id="spanCantidad"></span></li>
                        <li class="list-group-item">
                            <select class="form-select" aria-label="Default select example" name="talle" id="talle">
                                @foreach ($stock as $stk)
                                    @foreach ($talles as $talla)
                                        @if (($stk->id_talle)==($talla->id))
                                            <option value={{ $talla->id }}>{{ $talla->talla }}</option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>
                        </li>
                    </ul>
                    <div class="card-body">
                        <input type="hidden" value="{{ $productos->id}}" name="idProducto" id="idProducto">
                        <input type="hidden" name="idstock" id="idstock">
                        <input type="number" id="cantidad" class="form-control" name="cantidad" max="" min="1">
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
    </div>
</div>
<script>
    $(document).ready(function () {
        $( "#a-tienda" ).toggleClass("active");
        buscarCantidadStock();
        const csrfToken=document.head.querySelector("[name~=csrf-token][content]").content;

        $("#talle").change(function(){
            buscarCantidadStock();
        })

        function buscarCantidadStock(){
            var idIndumentaria=document.getElementById('idProducto').value
            var idTalle=document.getElementById('talle').value
            $.get("/getCantidadStock/" + idIndumentaria + "/" + idTalle, function(data){
                //console.log(data);
                //console.log(data["stock"]["cantidad"]);
                var cantidadStock=data["stock"]["cantidad"];
                var idStock=data["stock"]["id"];
                var spanCantidad=document.getElementById("spanCantidad")
                var inputCantidad=document.getElementById("cantidad")
                var inputStock=document.getElementById("idstock");
                inputStock.value=idStock
                inputCantidad.setAttribute("max",cantidadStock); // set a new value;
                spanCantidad.innerHTML=cantidadStock
            });
        }
    });
</script>
@endsection