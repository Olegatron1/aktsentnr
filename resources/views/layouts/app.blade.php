<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ session('city_slug') ? route('city.about', ['slug' => session('city_slug')]) : route('city.about') }}">О нас</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ session('city_slug') ? route('city.news', ['slug' => session('city_slug')]) : route('city.news') }}">Новости</a>
            </li>
        </ul>
    </div>
</nav>
<header>
    @yield('header')
</header>
<div class="container">
    @yield('content')
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $("#cityFilter").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#cityList li").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
</body>
</html>
