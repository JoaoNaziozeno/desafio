<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Feed - {{ config('app.name') }}</title>

    <link href="{{ asset('white') }}/css/white-dashboard.css?v=1.0.0" rel="stylesheet" />
    <link href="{{ asset('white') }}/css/theme.css" rel="stylesheet" />
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('noticias.feed') }}">
            Portal de Notícias
        </a>
    </div>
</nav>

<div class="main-panel" style="width:100%;">
    <div class="content">
        <div class="container">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{ asset('white') }}/js/core/jquery.min.js"></script>
<script src="{{ asset('white') }}/js/core/bootstrap.min.js"></script>
<script src="{{ asset('white') }}/js/white-dashboard.min.js?v=1.0.0"></script>

</body>
</html>