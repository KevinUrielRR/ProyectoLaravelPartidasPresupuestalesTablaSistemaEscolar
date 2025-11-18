<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema Académico')</title>
    <!-- Bootstrap CSS -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<style>
.container-fluid {
background-color: silver;
}
.navbar-toggler{ background: linear-gradient(0deg, #00ffff, #00ffff, #cccccc, #0000ff, #0000ff);}

.text-center{
background-color: gray;
}

.dropdown-item{
background-color: #aaaaaa;
}

.dropdown-toggle{
color: blue;
}
</style>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Sistema Académico</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>

            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Cursos y Grupos -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navCursos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Partidas Presupuestales
    </a>
    <ul class="dropdown-menu" aria-labelledby="navCursos">
        <li><a class="dropdown-item" href="{{ route('partidas_presupuestales.index') }}">Mostrar</a></li>
        <li><a class="dropdown-item" href="{{ route('partidas_presupuestales.create') }}">Agregar</a></li>
    </ul>
</li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="container py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-3">
        <div class="container text-center">
            <p class="mb-0">&copy; 2025 Sistema Académico. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
