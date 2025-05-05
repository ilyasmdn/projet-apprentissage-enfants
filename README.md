# Plateforme d'Apprentissage pour Enfants

Une plateforme éducative web construite avec Laravel, conçue pour aider les enfants à apprendre à travers du contenu interactif.

## Aperçu du Projet

Cette plateforme offre un environnement d'apprentissage interactif pour les enfants, proposant :

-   Du contenu éducatif catégorisé
-   Des supports d'apprentissage multimédia
-   Une interface d'administration pour la gestion du contenu
-   Une interface adaptée aux enfants

## Stack Technique

-   **Framework** : Laravel
-   **Frontend** : Blade
-   **Base de données** : MySQL
-   **Gestionnaires de paquets** : Composer (PHP) et NPM (JavaScript)

## Structure du Projet

-   `app/Models/` - Contient les modèles de données (Admin, Categorie, Element, Multimedia, User)
-   `database/migrations/` - Structure de la base de données et relations
-   `resources/` - Assets frontend et vues
-   `routes/` - Routes de l'application
-   `public/` - Fichiers accessibles publiquement

## Installation

1. Cloner le dépôt
2. Installer les dépendances PHP :

```bash
composer install
```

3. Installer les dépendances JavaScript :

```bash
npm install
```

4. Copier `.env.example` vers `.env` et configurer votre base de données
5. Générer la clé d'application :

```bash
php artisan key:generate
```

6. Exécuter les migrations :

```bash
php artisan migrate
```

7. Démarrer le serveur de développement :

```bash
php artisan serve
```

8. Dans un terminal séparé, démarrer Vite :

```bash
npm run dev
```

## Fonctionnalités

-   Authentification et autorisation des utilisateurs
-   Catégorisation du contenu
-   Support du contenu multimédia
-   Tableau de bord administratif
-   Éléments d'apprentissage interactifs
