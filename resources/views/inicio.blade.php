@extends('layouts.app')
<!-- comentado debido a que por algun motivo me toma mal el layout y me resetea los href -->
@section('content')
<!-- carrousel -->
<div id="carouselExampleFade" class="carousel slide carousel-fade w-70" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('img/coming_soon.gif')}}" class="rounded mx-auto d-block w-100" alt="coming soon">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/dr1ve.png')}}" class="rounded mx-auto d-block w-100" alt="logo dr1ve">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/coming_soon.gif')}}" class="rounded mx-auto d-block w-100" alt="coming soon">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<script>
    $( "#a-incio" ).toggleClass("active");
</script>
@endsection