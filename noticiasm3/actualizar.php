<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"]) && isset($_GET["titulo"]) && isset($_GET["articulo"]) && isset($_GET["imagen"])) {
    $id = $_GET["id"];
    $titulo = $_GET["titulo"];
    $articulo = $_GET["articulo"];
    $imagen = $_GET["imagen"];
}
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

    if (isset($_POST["titulo"]) && isset($_POST["articulo"])) {
        $tituloR = $_POST["titulo"];
        $articuloR = $_POST["articulo"];
        $idR = $_POST["id"];

        // Verificar si se seleccionó una nueva imagen
        if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
            $directorioImagenes = 'imagenes/';
            if (!is_dir($directorioImagenes)) {
                mkdir($directorioImagenes, 0777, true);
            }
            $nombreImagen = uniqid() . '_' . $_FILES['imagen']['name'];
            $rutaImagen = $directorioImagenes . $nombreImagen;
            move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen);

            // Actualizar la noticia, incluyendo la imagen si se seleccionó una nueva
            $sql = "UPDATE `noticias` SET titulo = ?, articulo = ?, imagen = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $tituloR, $articuloR, $rutaImagen, $idR);
        } else {
            // Actualizar la noticia sin cambiar la imagen
            $sql = "UPDATE `noticias` SET titulo = ?, articulo = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $tituloR, $articuloR, $idR);
        }

        $result = $stmt->execute();

        if ($result) {
            header('Location: index.php');
            exit;
        } else {
            // Manejar cualquier error aquí
            echo "Error al actualizar la noticia en la base de datos: " . $conn->error;
        }

        // Cerrar la sentencia y la conexión
        $stmt->close();
        $conn->close();
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
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" value="<?php echo $titulo; ?>">
                </div>
                <div class="mb-3">
                    <label for="articulo" class="form-label">Articulo</label>
                    <textarea class="form-control" id="articulo" rows="3" name="articulo"><?php echo $articulo; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Cargar imagen</label>
                    <input class="form-control" type="file" id="imagen" name="imagen">
                </div>
                <input type="submit" class="btn btn-dark" value="Actualizar">
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