@extends('layouts.app')

@section('title', 'Biblioteca CUBO')
@vite('resources/css/app.css')
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

<!-- SECION DE SERVICIOS-->
 <section class="servicios-section"> 
    <h2>Nuestros Servicios</h2>
    <div class="servicios-container">
      <div class="servicio-card">
        <i class="fa fa-book-open"></i>
        <h3>Lectura Virtual</h3>
        <p>Accede a una amplia variedad de libros y recursos digitales desde cualquier dispositivo, para disfrutar de la lectura en cualquier lugar y en cualquier momento.</p>
      </div>
      <div class="servicio-card">
        <i class="fa fa-headphones"></i>
        <h3>Audios libros</h3>
        <p>Disfruta de tus libros favoritos en formato de audio, disponibles para escuchar en cualquier lugar y en cualquier momento. Ideal para quienes prefieren la lectura auditiva mientras se trasladan o realizan otras actividades.</p>
      </div>
      <div class="servicio-card">
        <i class="fa fa-book-reader"></i>
        <h3>Prestamos de libros fisicos</h3>
        <p>Obtén acceso a una gran colección de libros físicos, disponibles para préstamo. Podras solicitar  el libro que más te interese para disfrutar de una experiencia de lectura tradicional. </p>
      </div>
    </div>
  </section>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <!-- SECION DE CATALOGOS-->
<section class="seccion-biblioteca">
    <h2>La Biblioteca Virtual del CUBO San Miguel te ofrece un amplio catálogo</h2>
    <div class="biblioteca-cards-container">
      <div class="biblioteca-card">
        <img src="{{ asset('img/poema.png') }}" alt="Poemas ">
        <h3>Poemas</h3>
        <p>Encuentra una amplia colección de poemas de autores nacionales e internacionales.</p>
      </div>

      <div class="biblioteca-card">
        <img src="{{ asset('img/comic.jpeg') }}" alt="Cómics">
        <h3>Cómics</h3>
        <p>Disfruta de los mejores cómics y descubre nuevas historias y personajes.</p>
      </div>

      <div class="biblioteca-card">
        <img src="{{ asset('img/ciencia.jpg') }}" alt="Ciencia">
        <h3>Ciencia ficcion</h3>
        <p>Descubre mundos futuristas y emocionantes con libros y recursos interactivos de ciencia ficción.</p>
      </div>

      <div class="biblioteca-card">
        <img src="{{ asset('img/cuentos.jpg') }}" alt="Cuentos">
        <h3>Cuentos</h3>
        <p>Lee cuentos para todas las edades, desde clásicos hasta autores contemporáneos.</p>
      </div>

      <div class="biblioteca-card">
        <img src="{{ asset('img/revistas.jpg') }}" alt="Revistas">
        <h3>Revistas</h3>
        <p>Accede a una variedad de revistas científicas, literarias y culturales.</p>
      </div>
    </div>
    <p class="mas-te-espera">¡Y mucho más te espera!</p>
  </section>

  
  <!-- SECION DE UBICACION DEL LUGAR-->
 <section class="visitanos-section">
    <h2>Visítanos en nuestras instalaciones</h2>
    <div class="images-container">
      <!-- Imagen 1 -->
      <div class="image-container">
        <img src="{{ asset('img/CUBO.jpg') }}" alt="Imagen del Lugar 1" style="width: 100%; height: auto; border-radius: 10px;">
      </div>

      <!-- Imagen 2 -->
      <div class="image-container">
        <img src="{{ asset('img/CUBO2.jpg') }}" alt="Imagen del Lugar 2" style="width: 100%; height: auto; border-radius: 10px;">
      </div>
    </div>
    
    <!-- Título para el mapa -->
    <p class="location-title">Ubicación del CUBO</p>

    <!-- Mapa -->
    <div class="map-container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3814.46070606334!2d-88.19666578949384!3d13.465449303804466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f7b2bb7208b5bd5%3A0xd3e595f11181c3bd!2sCentro%20Urbano%20de%20Bienestar%20y%20Oportunidades%20(CUBO)%20Milagro%20de%20La%20Paz!5e1!3m2!1ses-419!2ssv!4v1750813143874!5m2!1ses-419!2ssv" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </section>
</body>
</html>


<style>

    /* CSS DE SERVICIOS */
     .servicios-section {
      background-color: #212121; /* Fondo oscuro */
      color: white;
      padding: 60px 20px;
      text-align: center;
      margin-bottom: 50px;
    }
    .servicios-section h2 {
      font-size: 40px;
      margin-bottom: 30px;
      font-weight: bold;
    }
    .servicios-container {
      display: flex;
      justify-content: center; /* Centrar las tarjetas */
      gap: 20px; /* Espacio más pequeño entre tarjetas */
      flex-wrap: wrap;
      margin-top: 30px;
    }
    .servicio-card {
      background-color: #333333;
      border-radius: 10px;
      padding: 20px;
      width: 200px; /* Ancho más pequeño */
      text-align: center;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      transition: all 0.3s ease;
    }
    .servicio-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
    }
    .servicio-card h3 {
      font-size: 22px; /* Tamaño de fuente un poco más pequeño */
      margin: 20px 0;
      font-weight: bold;
    }
    .servicio-card p {
      font-size: 14px; /* Fuente más pequeña */
      margin-bottom: 20px;
    }
    .servicio-card i {
      font-size: 40px; /* Íconos un poco más pequeños */
      color: #30c213;
      margin-bottom: 20px;
    }

    /* CSS DE CATALOGO */
 .seccion-biblioteca {
      padding: 60px 20px;
      background-color: #ffffff;
      text-align: center;
    }

    .seccion-biblioteca h2 {
      font-size: 36px;
      margin-bottom: 30px;
      font-weight: bold;
      color: #212121;
    }

    .biblioteca-cards-container {
      display: flex;
      justify-content: space-around;
      gap: 20px;
      flex-wrap: wrap;
    }

    .biblioteca-card {
      background-color: #333333;
      border-radius: 10px;
      width: 200px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      transition: all 0.3s ease;
      text-align: center;
      color: white;
    }

    .biblioteca-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
    }

    .biblioteca-card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
      transition: all 0.3s ease;
    }

    .biblioteca-card:hover img {
      transform: scale(1.1); /* Imagen se expande al pasar el mouse */
    }

    .biblioteca-card h3 {
      font-size: 22px;
      margin: 15px 0;
    }

    .biblioteca-card p {
      font-size: 14px;
      padding: 0 15px 20px;
      margin: 0;
    }

    .mas-te-espera {
      font-size: 20px;
      margin-top: 40px;
      font-weight: bold;
      color:rgb(0, 0, 0);
    }


 /* CSS DE SECCION DEL LUGAR MAS EL MAPA */
 .visitanos-section {
      background-color: #dcdcdc; /* Cuadro gris claro */
      padding: 40px 20px;
      text-align: center;
      margin-top: 60px;
    }

    .visitanos-section h2 {
      font-size: 32px;
      margin-bottom: 20px;
      font-weight: bold;
      color: #212121;
    }

    .images-container {
      display: flex;
      justify-content: space-around;
      gap: 20px;
      margin-top: 20px;
      flex-wrap: wrap;
    }

    .image-container {
      width: 45%;
      max-width: 600px;
      margin-bottom: 20px;
      transition: transform 0.3s ease-in-out; /* Suaviza el efecto */
    }

    .image-container img {
      width: 100%;
      height: auto;
      border-radius: 10px;
      transition: transform 0.3s ease-in-out; /* Efecto suave para la imagen */
    }

    .image-container:hover img {
      transform: scale(1.1); /* Aumenta el tamaño de la imagen al pasar el mouse */
    }

    .map-container {
      width: 100%;
      height: 400px;
      margin-top: 30px;
      text-align: center;
    }

    iframe {
      width: 100%;
      height: 100%;
      border: 0;
    }

    .location-title {
      font-size: 24px;
      font-weight: bold;
      margin-top: 20px;
      color: #212121;



</style>

@endsection
