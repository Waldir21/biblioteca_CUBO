@extends('layouts.app')

@section('title', 'Biblioteca CUBO')

@section('content')
<section class="hero">
    <div class="hero-text">
        <h1>BOOK LIBRARY<br>WEB ARCHIVE</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <a href="#" class="btn">INICIAR</a>
    </div>
    <div class="hero-image">
        <img src="{{ asset('img/portada.png') }}" alt="Library Illustration ">
    </div>
</section>
@endsection
