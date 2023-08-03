<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-2 text-center">
                    <h1>Noticias</h1>
                </div>
                <div class="col-6">
                    <a href="{{ route('crear') }}" class="btn btn-dark mt-3">Crear Noticias</a>
                </div>
            </div>
            <form action="{{ route('eliminar') }}" method="post">
                @csrf
                @if (isset($noticias_result) && count($noticias_result) > 0)
                    @foreach ($noticias_result as $row)
                        <div class="row bordes m-5 text-center">
                            <h2>{{ $row->titulo }}</h2>
                            <div class="col-6 parrafo">
                                <p>{{ $row->articulo }}</p>
                            </div>
                            <div class="col-4">
                                <img class="imagen" src="{{ asset($row->imagen) }}" width=300>
                            </div>
                            <div class="col-2 border">
                                <a href="{{ route('mostrarActualizar', ['id' => $row->id]) }}" class="btn btn-warning mt-2 actualizar">Editar</a>
                                <button type="submit" class="btn btn-danger mt-2 eliminar" name="eliminar" value="1">Eliminar</button>
                                <input type="hidden" name="noticia_id" value="{{ $row->id }}">
                            </div>
                        </div>
                    @endforeach
                @endif
            </form>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
