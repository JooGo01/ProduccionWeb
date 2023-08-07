@extends('layouts.app')

@section('content')

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <img src="img/dr1ve.png" alt="Imagen de Dr1ve" class="img-fluid">
      </div>
      <div class="col-md-6">
        <h2>Nuestra Historia</h2>
        <p>
          En Dr1ve, somos un equipo apasionado de amantes de las carreras de automovilismo y la moda. Nuestra historia comenzó hace unos años cuando decidimos unir fuerzas para crear algo especial relacionado con el mundo de la Fórmula 1.
          Inspirados por el ruido ensordecedor de los motores, la velocidad vertiginosa y el glamour de las pistas, nos propusimos dar vida a una empresa que permitiera a los fanáticos expresar su pasión por este emocionante deporte a través de la moda.
          A lo largo de nuestra travesía, recorrimos los circuitos más icónicos y nos sumergimos en la historia de leyendas como Ayrton Senna y Michael Schumacher. Cada experiencia nos inspiró a crear una colección única y auténtica que capturara el espíritu de la Fórmula 1 en cada prenda.
        </p>
        <h2>Nuestro Propósito</h2>
        <p>
          En Dr1ve, nos esforzamos por brindarte una experiencia única y auténtica a través de nuestra exclusiva colección de ropa y accesorios inspirados en la Fórmula 1. Queremos que te sientas parte de nuestra comunidad y compartas tu pasión por este emocionante deporte a través de nuestras prendas cuidadosamente seleccionadas.
          Nuestro propósito es ser el destino predilecto para los fanáticos de la Fórmula 1 que buscan una conexión más profunda con su deporte favorito. Cada prenda que ofrecemos está diseñada para reflejar el espíritu apasionado de las carreras y el estilo atemporal que caracteriza a este mundo.
          Ya sea que estés en las tribunas animando a tu piloto favorito o siguiendo la emoción de la Fórmula 1 desde la comodidad de tu hogar, queremos que te sientas parte de la acción en cada momento. ¡Juntos aceleraremos hacia la victoria de la moda y la pasión por la velocidad!
        </p>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function () {
        $( "#a-nosotros" ).toggleClass("active");
    });
  </script>
@endsection