<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Loja de Roupas</title>
    {{-- vite(): gera as tags <link>/<script> certas, apontando pro CSS/JS compilado --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <a href="{{ route('produtos.index') }}">Produtos</a>
    </header>

    <main>
        {{-- Se a sessao tiver uma mensagem de "sucesso" (definida no Controller), mostra ela --}}
        @if (session('sucesso'))
            <p style="color: green;">{{ session('sucesso') }}</p>
        @endif

        @yield('conteudo');
    </main>
</body>
</html>