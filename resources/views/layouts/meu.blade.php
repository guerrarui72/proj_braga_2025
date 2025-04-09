<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Minha Aplicação')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> {{-- Se estiveres a usar Laravel Mix --}}
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        nav { background: #333; padding: 1rem; }
        nav a { color: white; margin-right: 1rem; text-decoration: none; }
        .content { padding: 2rem; }
    </style>
</head>
<body>
    <nav>
        <a href="{{route('clientes.index')}}">clientes</a>
        <a href="{{ url('/sobre') }}">Sobre</a>
        <a href="{{ url('/contato') }}">Contato</a>
    </nav>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
