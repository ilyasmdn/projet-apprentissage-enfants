@extends('layouts.app')

@section('content')
<div class="categories-page">
    <header class="categories-header">
        <h1 class="categories-title">Catégories d'apprentissage</h1>
    </header>

    <div class="categories-grid">
        @foreach($categories as $categorie)
            <div class="category-card">
                <div class="category-content">
                    <h2 class="category-title">{{ $categorie->nom }}</h2>
                    <p class="category-description">{{ $categorie->description }}</p>
                    <a href="{{ route('categories.show', $categorie->id) }}" class="button">
                        Explorer <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
