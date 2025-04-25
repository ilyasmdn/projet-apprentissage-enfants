<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site d'Apprentissage pour Enfants</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="main-nav">
        <div class="container">
            <a class="brand-link" href="{{ url('/') }}">Apprendre en s'amusant</a>
            <button class="nav-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="nav-toggle-icon"></span>
            </button>
            <div class="nav-menu" id="navbarNav">
                <ul class="nav-list primary">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">Catégories</a>
                    </li>
                </ul>
                <ul class="nav-list secondary">
                    @auth('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Administration</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('admin.logout') }}" method="POST" class="inline-form">
                                @csrf
                                <button type="submit" class="nav-button">Déconnexion</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.login') }}">Connexion Admin</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="main-content">
        @if (session('success'))
            <div class="message success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="message error">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="main-footer">
        <div class="container">
            <span class="footer-text">© 2025 Site d'Apprentissage pour Enfants</span>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
