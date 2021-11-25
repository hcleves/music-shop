<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    @livewireStyles
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{Route('home')}}">Music Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{Route::is('home')?'active':''}}" href="{{Route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::is('album.create')?'active':''}}"
                            href="{{Route('album.create')}}">Cria Novo Album</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="padding-bottom: 10rem;">
        @yield('content')
    </div>

    <footer class="fixed-bottom page-footer text-white bg-primary">

        <!-- Copyright -->

        <div class="text-left text-dark p-3">
            Made by <a href="https://github.com/hcleves" class="text-dark">Henrique Cleves</a>
            <br>Made using Bootstrap, Livewire and Laravel
        </div>
        <div class="text-center text-dark p-3">
            © 2021 Copyright
        </div>
        <!-- Copyright -->
    </footer>
    @livewireScripts

</body>

</html>