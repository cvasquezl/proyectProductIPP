<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <form action="{{ route('actualizar') }}" method="post" id="formularioNoticia" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-6 mt-5 ">
                <h1>Administracion de noticias</h1>
                <input type="hidden" name="id" value="{{ $id }}">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" value="{{ $titulo }}">
                </div>
                <div class="mb-3">
                    <label for="articulo" class="form-label">Articulo</label>
                    <textarea class="form-control" id="articulo" rows="3" name="articulo">{{ $articulo }}</textarea>
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
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
