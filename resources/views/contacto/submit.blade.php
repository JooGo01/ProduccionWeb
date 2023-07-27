@extends("layouts.app")
@section("content")
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Mensaje enviado</h4>
        <p>
            <ul class="list-group">
                <li class="list-group-item">Mail: {{ $_POST["mail"] }}</li>
                <li class="list-group-item">Telefono: {{ $_POST["telefono"] }}</li>
                <li class="list-group-item">Motivo: {{ $_POST["motivo"] }}</li>
                <li class="list-group-item">Mensaje: {{ $_POST["mensaje"] }}</li>
            </ul>
        </p>
        <hr>
        <p class="mb-0">Muchas gracias por contactarse con nosotros.<br>Responderemos al contacto en un lapso entre 24 horas a 72 horas habiles.</p>
    </div>
    <script>
        $(document).ready(function () {
            $( "#a-contacto" ).toggleClass("active");
        });
    </script>
@endsection