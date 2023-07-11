<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST["nombre"];
  $edad = $_POST["edad"];
  $interes = isset($_POST["interes"]) ? false : true;
}
$parrafos = [
  '<p class="parrafo1 col-12">
    Ser un ilustrador digital es una aventura emocionante y llena de
    diversión. Es un mundo donde la imaginación se desata y las ideas
    cobran vida a través de trazos y colores digitales. ¿Qué podría ser
    más emocionante que dar vida a personajes y mundos enteros desde la
    comodidad de tu pantalla?
  </p>',

  '<p class="parrafo2 col-12">
    La magia de ser un ilustrador digital radica en la libertad creativa
    que se experimenta. No hay límites físicos ni restricciones
    materiales. Con las herramientas digitales adecuadas, puedes explorar
    infinitas posibilidades y experimentar con estilos, texturas y efectos
    visuales sin fin.
  </p>',
  '<p class="parrafo3 col-12">
    Imagina sumergirte en un lienzo en blanco y ver cómo tus ideas toman
    forma poco a poco. Cada trazo y cada pincelada digital son como
    píxeles de emoción que se entrelazan para contar una historia. Desde
    el primer boceto hasta el último detalle, el proceso de creación es
    una montaña rusa de emociones que te mantendrá siempre en vilo.
  </p>',
  '<p class="parrafo4 col-12">
    La versatilidad del arte digital es una fuente inagotable de
    diversión. Puedes crear desde ilustraciones detalladas y realistas
    hasta personajes caricaturescos y fantásticos. El mundo digital te
    ofrece una paleta de colores infinita y herramientas que te permiten
    experimentar con efectos especiales y animaciones que dan vida a tus
    creaciones.
  </p>',
  '<p class="parrafo5 col-12">
    Además, ser un ilustrador digital también significa formar parte de
    una comunidad vibrante y colaborativa. Las redes sociales y las
    plataformas en línea te brindan la oportunidad de conectarte con otros
    artistas, compartir tus trabajos y recibir retroalimentación
    constructiva. ¡Es increíble cómo la pasión por el arte digital puede
    unir a personas de diferentes rincones del mundo!
  </p>',
  '<p class="parrafo1 col-12">
  Las ilustraciones son una herramienta poderosa para despertar la imaginación y las emociones en los niños. Los colores vibrantes, los personajes encantadores y los escenarios fantásticos presentes en las ilustraciones pueden transportar a los niños a mundos nuevos y emocionantes. Estas imágenes atractivas pueden hacer que los niños se sientan emocionados, curiosos y ansiosos por explorar más.
  </p>',
  '<p class="parrafo2 col-12">
  Las ilustraciones también pueden transmitir mensajes y emociones de manera efectiva. Los niños pueden conectarse emocionalmente con los personajes y las situaciones representadas en las ilustraciones. Pueden experimentar alegría, tristeza, miedo o empatía a través de las imágenes, lo que les permite explorar y comprender mejor sus propias emociones. Las ilustraciones pueden ser una forma segura y accesible para que los niños expresen sus sentimientos y exploren diferentes estados de ánimo.
  </p>',
  '<p class="parrafo3 col-12">
  Las ilustraciones pueden fomentar la creatividad y la expresión artística en los niños. Al observar los diferentes estilos y técnicas utilizadas en las ilustraciones, los niños pueden sentirse inspirados para crear sus propias obras de arte. Las ilustraciones pueden despertar la pasión por el dibujo y la pintura, y alentar a los niños a explorar su creatividad de manera única y personal.
  </p>',
  '<p class="parrafo4 col-12">
  Las ilustraciones pueden ayudar a los niños a desarrollar habilidades cognitivas y de aprendizaje. Al observar las imágenes detalladas, los niños pueden ejercitar su capacidad de observación, identificar patrones y detalles, y construir conexiones entre diferentes elementos visuales. Las ilustraciones también pueden ser utilizadas como herramientas educativas, permitiendo a los niños aprender sobre diferentes temas de una manera visualmente atractiva y memorable.
  </p>',
  '<p class="parrafo5 col-12">
  Finalmente, las ilustraciones pueden generar un sentimiento de confort y seguridad en los niños. Las imágenes cálidas y acogedoras pueden crear un ambiente familiar y reconfortante, especialmente en los libros ilustrados para los más pequeños. Estas ilustraciones pueden ayudar a los niños a sentirse acompañados y protegidos, proporcionando un refugio seguro en el que puedan explorar y procesar sus emociones.
  </p>',
];
$imagenes = [
  '<img class="section2img" src="./imagen/section2.jpg" alt="" />',
  '<img class="imagenescuadradas" src="./imagen/1.png" alt="imagen1" />',
  '<img class="imagenescuadradas" src="./imagen/2.png" alt="imagen1" />',
  '<img class="imagenescuadradas" src="./imagen/3.jpg" alt="imagen1" />',
  '<img class="imagenescirculares" src="./imagen/4.jpg" alt="imagen1" />',
  '<img class="imagenescirculares" src="./imagen/5.jpg" alt="imagen1" />',
  '<div class="carousel-item active">
    <img src="./imagen/carrusels1.png" class="d-block w-100" alt="..." />
  </div>',
  '<div class="carousel-item">
    <img src="./imagen/carrusels2.png" class="d-block w-100" alt="..." />
  </div>',
  '<div class="carousel-item">
    <img src="./imagen/carrusels3.jpg" class="d-block w-100" alt="..." />
  </div>'
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <!-- aqui se pone el icono de la pestaña -->
  <link rel="shortcut icon" href="imagen/favicon.ico" type="image/x-icon" />
  <!-- el nombre de la pagina en la pestaña de navegacion del navegador -->
  <title>DrawOcen</title>
  <!-- se genera vinculo con el archivo css -->
  <link rel="stylesheet" href="./home.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <!-- link de las fuentes de letras -->
  <link href="https://fonts.googleapis.com/css2?family=Klee+One:wght@400;600&display=swap" rel="stylesheet" <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Josefin+Slab:wght@400;500&family=Kalam:wght@300;400;700&family=Poiret+One&family=Sacramento&family=Zeyada&display=swap" rel="stylesheet" />
  />
</head>

<body>
  <!-- lugar de navbar con su logo -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary row fixed-top">
    <a href=""><img src="./imagen/logo.png" width="50px" alt="" /></a>
    <!-- lugar de dropdowns menu desplegable  unas de la cosas que costo fue que el drop hiciera su funcion es decir que muestre sus 
      anclas y una de la razon por la cual no funcionaba en el inicio fue por que el starter-template esta ocupando la version 4 de
      boostrap y los modelos que estaba utilazando directamente de la pagina de boostrap estaban en la version 5 por lo que tuve que buscar
      como se escribia en la version anterior ya que cuando me di cuenta lo tenia muy avanzado como para cambiar el link de la version
      actual-->
    <div class="dropdown">
      <a class="btn btn-dark dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
        Menu
      </a>
      <!-- anclas que tiene el dropdowns -->
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#Inicio">Inicio</a></li>
        <li>
          <a class="dropdown-item" href="#Lo que nos emociona">Lo que nos emociona</a>
        </li>
        <li><a class="dropdown-item" href="#Galeria">Galeria</a></li>
      </ul>
    </div>
  </nav>

  <!-- primer section para darle espacio a la primera imagen en donde se pone un un centrador de contenido al igual que lo acompaña 
    una opacidad para hacer que los titulos no pierdan importacia lo que me complico en uno inicio fue la opacidad ya que esta estaba ocupando
  el color del body por lo que tuve que hacerlo de manera apartado para que estuviera encima de la imagen -->
  <section class="row justify-content-center" id="Inicio">
    <div class="inicio col-12 text-center">
      <div class="opacity">
        <h1 class="inicio-text1">Descubre...</h1>
        <h1 class="inicio-text2">Inspirate...</h1>
        <h1 class="inicio-text3">!Imagina¡</h1>
      </div>
    </div>
  </section>
  <!-- segundo section donde nos vamos al espacio de parrafos con diferentes fuentes y tamaños para hacerla mas entretenida y acompañada
    de una imagen para hacerla mas actractiva -->
  <section class="parrafos row" id="Lo que nos emociona">
    <!-- primer div que utiliza 8 espacio para los parrafos y los parrafos ocupan el total de su espacio asignado en primera instancia -->
    <div class="col-8">
      <h1 id="titulo2">Lo que nos emociona</h1>
      <?php

      if ($edad >= 18) {
        for ($i = 0; $i < 5; $i++) {
          echo $parrafos[$i];
        };
      } else {
        for ($i = 5; $i < 10; $i++) {
          echo $parrafos[$i];
        };
      }

      ?>

    </div>
    <!-- segundo div que ocupa 4 espacios para poner imagen al lado de los parrafos -->
    <div class="brother col-4">
      <?php
      echo $imagenes[0];
      ?>
    </div>
    <!-- segundo section que le da espacio a la galeria en donde se ocupa un row para tenerlo en fila en la que se crean dos div cada uno
      con 12 de col para que tomen su espacio  -->
  </section>
  <section id="Galeria">
    <div class="galeria1 row">
      <h1 id="titulo3">Galeria</h1>
      <div class="col-12 fotos">
        <?php
        for ($i = 1; $i < 4; $i++) {
          echo $imagenes[$i];
        };
        ?>


      </div>
      <div class="col-12 fotos">
        <?php
        for ($i = 4; $i < 6; $i++) {
          echo $imagenes[$i];
        };
        ?>

      </div>
    </div>
  </section>
  <!-- tercer section para la implementacion del carrusel donde se ponen las imagenes y que cambia de manera automatica al igual
    que el dropdowns lo que costo fue que funcionara como corresponde y era por lo mismo de las versiones y despues lo que me costo 
  pero me gusto aprender fue como agrandar los botones del carrusel ya que la version 4 tenia botones mas pequeños luego me di cuenta
en la diferencia que tenia el modelo que estaba ocupando de la pagina y la anterior para poder corregirlo y era tan sencillo cambiar la
etiqueta data-bs-ride lo otro por lo que no me funciono tambien fue por que no le habia creado la logica para que el carrucel se iniciara
con js  -->

  <section class="carrusel" <?php if ($interes) echo 'hidden'; ?>>
    <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
      <div class="carousel-inner">
        <?php
        for ($i = 6; $i < 9; $i++) {
          echo $imagenes[$i];
        };
        ?>
      </div>
      <!-- botones del carrusel para cambiar las fotos me costo entender por que no me mostraba los botoner que en primera instacia
        los habia quitado pero luego recorde lo de la desactualizacion de las versiones de boostrap por lo que cambie las etiquetas y ver 
      cual eran los botones que necesitaban  -->
      <a class="carousel-control-prev btn btn-dark btn-lg " href="#carouselExampleRide" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next btn btn-dark btn-lg" href="#carouselExampleRide" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- vinculo con el archivo de javascript -->
  <script src="./index.js"></script>
  <!-- pie de la pagina con nombre y nombre ficticio de la empresa -->
  <footer class="row">
    <div class="pies col-12 text-center">
      <h3>camila vasquez</h3>
      <h4>Draw Ocen</h4>
    </div>
  </footer>
</body>

</html>