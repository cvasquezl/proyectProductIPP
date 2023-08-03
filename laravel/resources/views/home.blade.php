<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <!-- aqui se pone el icono de la pestaña -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico')}}" type="image/x-icon" />
    <!-- el nombre de la pagina en la pestaña de navegacion del navegador -->
    <title>DrawOcen</title>
    <!-- se genera vinculo con el archivo css -->
    <link rel="stylesheet" href="{{ asset('css/home.css')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- link de las fuentes de letras -->
    <link href="https://fonts.googleapis.com/css2?family=Klee+One:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Josefin+Slab:wght@400;500&family=Kalam:wght@300;400;700&family=Poiret+One&family=Sacramento&family=Zeyada&display=swap" rel="stylesheet" />
</head>

<body>
    <!-- lugar de navbar con su logo -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary row fixed-top">
        <a href=""><img src="{{ asset('images/logo.png')}}" width="50px" alt="" /></a>
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
            @foreach ($parrafosMostrados as $parrafo)
            {!! $parrafo !!}
            @endforeach
        </div>
        <!-- segundo div que ocupa 4 espacios para poner imagen al lado de los parrafos -->
        <div class="brother col-4">
            <img class="section2img" src="{{ asset($imagen)}}" alt="" />
        </div>
        <!-- segundo section que le da espacio a la galeria en donde se ocupa un row para tenerlo en fila en la que se crean dos div cada uno
      con 12 de col para que tomen su espacio  -->
    </section>

    <section id="Galeria">
        <div class="galeria1 row">
            <h1 id="titulo3">Galeria</h1>
            <div class="col-12 fotos">
                @foreach ($imagenesGrupo1 as $imagen)
                <img class="imagenescuadradas" src="{{ asset($imagen)}}" alt="imagen" />
                @endforeach
            </div>
            <div class="col-12 fotos">
                @foreach ($imagenesGrupo2 as $imagen)
                <img class="imagenescirculares" src="{{ asset($imagen)}}" alt="imagen" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- tercer section para la implementacion del carrusel donde se ponen las imagenes y que cambia de manera automatica al igual
    que el dropdowns lo que costo fue que funcionara como corresponde y era por lo mismo de las versiones y despues lo que me costo 
  pero me gusto aprender fue como agrandar los botones del carrusel ya que la version 4 tenia botones mas pequeños luego me di cuenta
en la diferencia que tenia el modelo que estaba ocupando de la pagina y la anterior para poder corregirlo y era tan sencillo cambiar la
etiqueta data-bs-ride lo otro por lo que no me funciono tambien fue por que no le habia creado la logica para que el carrucel se iniciara
con js  -->

    <section class="carrusel" @if ($interes) hidden @endif>
        <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
            <div class="carousel-inner">
                @foreach ($imagenesGrupo3 as $imagen)
                <div class="carousel-item @if ($loop->first) active @endif">
                    <img src="{{ asset($imagen)}}" class="d-block w-100" alt="..." />
                </div>
                @endforeach
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