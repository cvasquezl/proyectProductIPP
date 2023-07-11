<!DOCTYPE html>
<html>

<head>
    <title>Serie Fibonacci</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass+Mono:wght@300;400;500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="fibonacci-container row justify-content-center">
        <div class="fibonacci col-6 text-center">
            <h2>Serie de Fibonacci</h2>
            <form class="ingreso" method="post">
                <div class="col-2 ">
                    <label for="num">Mostrar hasta el número:</label>
                    <input class="form-control" type="number" id="num" name="num" min="1" max="99" required>
                </div>
                <button class="boton" type="submit">Mostrar</button>
            </form>

            <?php
            function fibonacci($num)
            {
                $fibonacciSeries = [0, 1];

                if ($num <= 2) {
                    return array_slice($fibonacciSeries, 0, $num);
                }

                for ($i = 2; $i < $num; $i++) {
                    $fibonacciSeries[] = $fibonacciSeries[$i - 1] + $fibonacciSeries[$i - 2];
                }

                return $fibonacciSeries;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $num = $_POST['num'];

                echo "<h3>Serie de Fibonacci hasta el número $num:</h3>";

                $fibonacciSeries = fibonacci($num);

                echo "<ul>";
                foreach ($fibonacciSeries as $fibonacciNumber) {
                    echo "<li>$fibonacciNumber</li>";
                }
                echo "</ul>";
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>