<?php

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site d'Apprentissage pour Enfants</title>
    <!-- Lien vers les fichiers CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <!-- En-tête du site -->
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('categories.index') }}">Catégories</a></li>
                <li><a href="{{ route('elements.index') }}">Éléments</a></li>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenu principal -->
    <main>
        @yield('content')
    </main>

    <!-- Pied de page -->
    <footer>
        <p>&copy; 2025 Site d'Apprentissage pour Enfants</p>
    </footer>

    <!-- Lien vers les fichiers JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
