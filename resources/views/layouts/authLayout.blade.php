<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>
<body>
    <section class="relative flex flex-wrap lg:h-screen lg:items-center">
        @yield('contenido')
    </section>
</body>

</html>
