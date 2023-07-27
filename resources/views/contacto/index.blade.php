@extends('layouts.app')

@section('content')

<div class="container mt-5">
  <h2>Contacto</h2>
  <form action="{{ route('contacto.submit') }}" method="post">
    @csrf

    <div class="form-group">
      <label for="mail">Direccion de mail</label>
      <input type="email" class="form-control" id="mail" name="mail" placeholder="Ingresa tu direccion de mail">
    </div>

    <div class="form-group">
      <label for="telefono">Teléfono de contacto</label>
      <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu número de teléfono">
    </div>

    <div class="form-group">
      <label for="motivo">Motivo de contacto</label>
      <select class="form-control" id="motivo" name="motivo">
        <option value="reclamo">Reclamo</option>
        <option value="sugerencia">Sugerencia</option>
        <option value="consulta">Consulta</option>
      </select>
    </div>

    <div class="form-group">
      <label for="mensaje">Mensaje</label>
      <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
</div>
<script>
  $(document).ready(function () {
      $( "#a-contacto" ).toggleClass("active");
  });
</script>
@endsection
<!--
Si pones esto en teoría funciona flaco qcyo me lo dijo chatgpt    
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
-->