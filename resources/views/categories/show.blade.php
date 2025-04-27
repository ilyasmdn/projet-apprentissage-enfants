@extends('layouts.app')

@section('content')
<div class="category-detail">
    <header class="category-header">
        <h1 class="category-title">{{ $categorie->nom }}</h1>
        <a href="{{ route('categories.index') }}" class="button button-link">
            <i class="fas fa-arrow-left"></i> Retour aux catégories
        </a>
    </header>

    <div class="category-description">
        <p>{{ $categorie->description }}</p>
    </div>

    <div class="element-grid">
        @foreach($elements as $element)
            <div class="element-card">
                @if($element->multimedias->isNotEmpty())
                    <img src="{{ asset('storage/' . $element->multimedias->first()->chemin) }}" 
                         class="element-image" alt="{{ $element->nom }}">
                @endif
                <div class="element-content">
                    <h2 class="element-title">{{ $element->nom }}</h2>
                    <p class="element-description">{{ $element->description }}</p>
                    <a href="{{ route('elements.show', ['category' => $categorie->id, 'element' => $element->id]) }}" class="button">
                        Découvrir <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection