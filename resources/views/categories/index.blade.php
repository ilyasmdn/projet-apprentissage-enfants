@extends('layouts.app')

@section('content')
    <div class="categories-page">
        <header class="categories-header">
            <h1 class="categories-title">Catégories d'apprentissage</h1>
        </header>

        <div class="categories-grid">
            @foreach ($categories as $category)
                <div class="category-card">
                    <div class="category-content">
                        <h2 class="category-title">{{ $category->nom }}</h2>
                        <p class="category-description">{{ $category->description }}</p>
                        <a href="{{ route('categories.show', $category) }}" class="button">
                            Explorer <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
