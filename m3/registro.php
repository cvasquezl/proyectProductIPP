<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    if (isset($_POST["email"])) {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $ciudad = $_POST["ciudad"];
        $genero = $_POST["genero"];
        $errors = array();

        if (empty($nombre) || empty($apellido) || empty($email) || empty($pass) || empty($ciudad) || empty($genero)) {
            $errors[] = "Los campos son obligatorios";
        }


        if (empty($errors)) {
            //Enviar consulta a la base de datos
            $sql = "INSERT INTO `user` (nombre, apellido, email, password, ciudad, genero) VALUES (?, ?, ?, ?, ?, ?)";

            // Preparar la sentencia
            $stmt = $conn->prepare($sql);

            // Vincular los parámetros con los valores de las variables
            $stmt->bind_param("ssssss", $nombre, $apellido, $email, $pass, $ciudad, $genero);

            // Ejecutar la consulta
            $result = $stmt->execute();

            if ($result) {
                header('Location: index.php');
                exit;
            } else {
                // Manejar cualquier error aquí
                echo "Error al insertar en la base de datos: " . $conn->error;
            }

            // Cerrar la sentencia y la conexión
            $stmt->close();
            $conn->close();
        } else {
            // Impresión del script JavaScript si hay campos incompletos
            echo '<script>
                window.onload = function() {
                    var invalidFields = ' . json_encode($errors) . ';
                    var inputs = document.querySelectorAll("input, select");
    
                    for (var i = 0; i < inputs.length; i++) {
                        var input = inputs[i];
                        if (invalidFields.includes(input.name)) {
                            input.classList.add("invalid-field");
                        }
                    }
    
                    alert("Los campos son obligatorios. Por favor, complete los campos faltantes.");
                };
            </script>';
        }
    };
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;1,100;1,200;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="registro.css">
</head>

<body>
    <div class="row justify-content-center">
        <img src="./imagen/logo.png" alt="" class="logo">
        <div class="col-7 registro">
            <h1>Registro</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                        <div class="invalid-feedback">
                            ¡Debe ingresar su nombre!
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="ciudad" class="form-label">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" class="form-control" id="email" aria-describedby="inputGroupPrepend" name="email" required>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="col-md-6">
                        <label for="genero" class="form-label">Género</label>
                        <select class="form-control" id="genero" name="genero">
                            <option selected>Selecciona una opción</option>
                            <option value="Mujer">Mujer</option>
                            <option value="Hombre">Hombre</option>
                            <option value="No aplica">No aplica</option>
                        </select>
                    </div>
                </div>
                <input type="submit" class="btn btn-dark mb-3" value="Registrar"></input>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>