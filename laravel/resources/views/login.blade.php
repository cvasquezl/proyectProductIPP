<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;1,100;1,200;1,300&display=swap" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="row justify-content-center ">
        <img src="{{ asset('images/logo.png') }}" alt="" class="logo">
        <div class="col-4 login">
            <h1>Login</h1>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">contraseña</label>
                    <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                </div>
                <input type="submit" class="btn btn-dark mb-3" value="Logear"></input>
                <a href="{{ route('register') }}" class="list-group-item list-group-item-action list-group-item-warning col-5">Registrate !!!</a>
            </form>
        </div>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
