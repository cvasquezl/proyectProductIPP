<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="./consulta.css" />
    <title>Página de Inicio</title>
</head>

<body>

    <div class="row justify-content-center">
        <h1 class="titulo col-12 text-center">Bienvenido(a) a DrawOcen</h1>
        <form class="formulario col-12 align-items-center" method="post" action="home.php">
            <div class="row g-2">

                <div class=" col-6">
                    <label class="form-label" for="nombre">Nombre:</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" required><br><br>
                </div>

                <div class=" col-6">
                    <label class="form-label" for="edad">Edad:</label>
                    <input class="form-control" type="number" name="edad" id="edad" required><br><br>
                </div>

            </div>
            <div class=" interes row">
                <div class="col-12">
                    <label class="form-label" for="interes">¿Estás interesado(a) en la información de la página?</label><br>
                    <input class="form-control" type="checkbox" name="interes" id="interes" value="1"><br><br>
                    <input id="boton" type="submit" value="Enviar">
                </div>
            </div>     
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>