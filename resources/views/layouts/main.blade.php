<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    Hacktoon
                </a>
                <a class="navbar-brand" href="/">Home</a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">

                    <a class="nav-link" href="/servico">Cadastrar Serviço</a>
                    <a class="nav-link" href="/meus-agendamentos">Meus Agendamentos</a>
                    <a class="nav-link" href="/meus-servicos">Meus Serviços</a>

                        @auth
                            <form action="/logout" method="POST" style="display: inline;">
                                @csrf
                                <a class="nav-link" href="/logout" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                            </form>
                        @endauth

                        @guest
                            <a class="nav-link" href="/login">Login</a>
                            <a class="nav-link" href="/register">Criar conta</a>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container-fluid">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </main>

    <footer>
        <p>Hacktoon &copy; 2024</p>
        <p>Desenvolvido por Arthur, Anderson, Karoline e Rodrigo</p>
    </footer>

    <!-- Bootstrap 5 JS e dependências -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <script scr="/js/app.js"></script>
    <script src="/js/script.js"></script>
    <link rel="stylesheet" href="/css/style.css">
</body>
</html>
