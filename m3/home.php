<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST["nombre"];
  $edad = $_POST["edad"];
  $interes = isset($_POST["interes"]) ? false : true;

  $serverName = "localhost";
  $port = 3306;
  $userName = "root";
  $contraseña = "";
  $dbName = "drawocen";

  //Crear conexion
  $conn = new mysqli($serverName, $userName, $contraseña, $dbName, $port);
  //Verificar conexion
  if ($conn->connect_error) {
    die("Conexión Fallida: " . $conn->connect_error);
  }
  $query1 = "SELECT id, contenido FROM parrafos";
  $parrafos_result = $conn->query($query1);
  // Transformamos el resultado en un arreglo
  $parrafos = array();
  while ($row = $parrafos_result->fetch_assoc()) {
    $parrafos[] = $row['contenido'];
  }

  $query2 = "SELECT id, url FROM imagenes";
  $imagenes_result = $conn->query($query2);
  // Transformamos el resultado en un arreglo
  $imagenes = array();
  while ($row = $imagenes_result->fetch_assoc()) {
    $imagenes[] = $row['url'];
  }
}

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