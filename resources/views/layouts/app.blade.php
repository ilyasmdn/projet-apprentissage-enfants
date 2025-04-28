<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site d'Apprentissage pour Enfants</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet">
    <!-- App CSS -->
    @vite(['resources/css/app.css'])
</head>

<body>
    <nav class="main-nav">
        <div class="nav-wrapper">
            <a class="brand-link" href="{{ url('/') }}">
                <i class="fas fa-graduation-cap bounce"></i>
                Apprendre en s'amusant
            </a>
            <button class="nav-toggle" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="nav-menu" id="navbarNav">
                <ul class="nav-list primary">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">
                            <i class="fas fa-shapes"></i>
                            Catégories
                        </a>
                    </li>
                </ul>
                <ul class="nav-list secondary">
                    @auth('admin')
                        <li class="nav-item">
                            <a class="nav-link admin-link" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-user-shield"></i>
                                Administration
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('admin.logout') }}" method="POST" class="inline-form">
                                @csrf
                                <button type="submit" class="nav-button">
                                    <i class="fas fa-sign-out-alt"></i>
                                    Déconnexion
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.login') }}">
                                <i class="fas fa-lock"></i>
                                Connexion Admin
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="main-content">
        @if (session('success'))
            <div class="message success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="message error">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="main-footer">
        <div class="footer-wrapper">
            <div class="footer-content">
                <span class="footer-text">
                    <i class="fas fa-heart"></i>
                    © 2025 Site d'Apprentissage pour Enfants
                </span>
                <div class="social-links">
                    <a href="#" class="social-link" title="Facebook">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="social-link" title="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-link" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>

</html>
