@extends('layouts.app')

@section('title', 'Biblioteca CUBO')

@section('content')
<section class="hero">
    <div class="hero-text">
        <h1>BIBLIOTECA VIRTUAL<br>CUBO SAN MIGUEL</h1>
        <p>Explora el conocimiento sin límites desde cualquier lugar. Nuestra biblioteca virtual del Centro Urbano de Bienestar y Oportunidades (CUBO) en El Salvador pone a tu alcance una amplia colección de libros digitales, audiolibros, noticias sobre eventos culturales y un sistema moderno de préstamo de libros físicos.
Aquí promovemos la lectura, el aprendizaje y el acceso equitativo a la información para todas las comunidades. ¡Descubre, aprende y conéctate con la cultura en un solo lugar!
</p>
<a href="#" class="btn">INICIAR</a>
    </div>
    
    <div class="hero-image">
        <img src="{{ asset('img/portada.png') }}" alt="Library Illustration ">
    </div>
</section>
@endsection
