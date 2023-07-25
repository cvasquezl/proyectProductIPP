<?php
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

$query1 = "SELECT * FROM `noticias`";
$noticias_result = $conn->query($query1);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar"]) && isset($_POST["noticia_id"])) {
    $id = $_POST["noticia_id"];

    // Preparar y ejecutar la consulta DELETE para eliminar la noticia con el ID proporcionado
    $sql = "DELETE FROM `noticias` WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();

    if ($result) {
        // Redireccionar a "index.php" después de eliminar la noticia
        header('Location: index.php');
        exit;
    } else {
        // Manejar cualquier error aquí
        echo "Error al eliminar la noticia de la base de datos: " . $conn->error;
    }

    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-2 text-center">
                    <h1>Noticias</h1>
                </div>
                <div class="col-6">
                    <a href="crear.php" class="btn btn-dark mt-3">Crear Noticias</a>
                </div>
            </div>
            <form action="" method="post">
                <?php
                if (isset($noticias_result) && $noticias_result->num_rows > 0) {
                    while ($row = $noticias_result->fetch_assoc()) {
                        $id = $row['id'];
                        $titulo = $row['titulo'];
                        $articulo = $row['articulo'];
                        $imagen = $row['imagen'];
                        echo '<div class="row bordes m-5 text-center">';
                        echo '<h2>' . $titulo . '</h2>';
                        echo '<div class="col-6 parrafo">';
                        echo '<p>' . $articulo . '</p>';
                        echo '</div>';
                        echo '<div class="col-4">';
                        echo '<img class="imagen" src="' . $imagen . '" width=300>';
                        echo '</div>';
                        echo '<div class="col-2 border">';
                        echo '<a href="actualizar.php?id=' . $id . '&titulo=' . urlencode($titulo) . '&articulo=' . urlencode($articulo) . '&imagen=' . urlencode($imagen) . '" class="btn btn-warning mt-2 actualizar">Editar</a>';
                        echo '<button type="submit" class="btn btn-danger mt-2 eliminar" name="eliminar" value="1">Eliminar</button>';
                        echo '<input type="hidden" name="noticia_id" value="' . $id . '">';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </form>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>