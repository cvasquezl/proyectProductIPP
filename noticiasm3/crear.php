<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $serverName = "localhost";
    $port = 3306;
    $userName = "root";
    $contraseña = "";
    $dbName = "noticias";

    //Crear conexion
    $conn = new mysqli($serverName, $userName, $contraseña, $dbName, $port);
    //Verificar conexion
    if ($conn->connect_error) {
        die("Conexión Fallida: " . $conn->connect_error);
    }

    if (isset($_POST["titulo"]) && isset($_POST["articulo"]) && isset($_FILES["imagen"])) {
        $titulo = $_POST["titulo"];
        $articulo = $_POST["articulo"];
        $imagen = $_FILES["imagen"];


        if ($imagen['error'] === UPLOAD_ERR_OK) {


            $directorioImagenes = 'imagenes/';
            if (!is_dir($directorioImagenes)) {
                mkdir($directorioImagenes, 0777, true);
            }
            $nombreImagen = uniqid() . '_' . $imagen['name'];
            $rutaImagen = $directorioImagenes . $nombreImagen;

            if (move_uploaded_file($imagen['tmp_name'], $rutaImagen)) {
                $sql = "INSERT INTO `noticias` (titulo, articulo, imagen) VALUES (?, ?, ?)";

                // Preparar la sentencia
                $stmt = $conn->prepare($sql);

                // Vincular los parámetros con los valores de las variables
                $stmt->bind_param("sss", $titulo, $articulo, $rutaImagen);

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
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <form action="" method="post" id="formularioNoticia" enctype="multipart/form-data">
        <div class="row justify-content-center">
            <div class="col-6 mt-5 ">
                <h1>Administracion de noticias</h1>
                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
                </div>
                <div class="mb-3">
                    <label for="articulo" class="form-label">Articulo</label>
                    <textarea class="form-control" id="articulo" rows="3" name="articulo"></textarea>
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Cargar imagen</label>
                    <input class="form-control" type="file" id="imagen" name="imagen">
                </div>
                <input type="submit" class="btn btn-dark" value="crear">
            </div>
        </div>
    </form>


    <script>
    document.getElementById('formularioNoticia').addEventListener('submit', function(event) {
        event.preventDefault(); 

        
        this.submit(); 
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>