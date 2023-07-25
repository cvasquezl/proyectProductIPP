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

    //Obtener los datos del formulario
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
        $pass = $_POST["password"];
        //Enviar consulta a la base de datos
        $sql = "SELECT id, nombre, apellido, email, password, ciudad, genero FROM user WHERE email = '$email' AND password = '$pass'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            header('Location: consulta.php');
            exit;
            
        }else {
            // Impresión del script JavaScript si hay campos incompletos
            echo '<script>
                window.onload = function() {
                 
                    alert("El usuario y/o la contraseña son incorrectas.");
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
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;1,100;1,200;1,300&display=swap" rel="stylesheet">
    <title>Logint</title>
</head>

<body>
    <div class="row justify-content-center ">
        <img src="./imagen/logo.png" alt="" class="logo">
        <div class="col-4 login">
            <h1>Login</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">contraseña</label>
                    <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                </div>
                <input type="submit" class="btn btn-dark mb-3" value="Logear"></input>
                <a href="registro.php" class="list-group-item list-group-item-action list-group-item-warning col-5">Registrate !!!</a>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>