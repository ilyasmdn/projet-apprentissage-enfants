@extends('layouts.app')

@section('content')
<div class="element-manager">
    <header class="element-manager-header">
        <h1 class="element-manager-title">Éléments de {{ $category->nom }}</h1>
        <a href="{{ route('elements.create', ['category' => $category->id]) }}" class="button">
            <i class="fas fa-plus"></i> Ajouter un élément
        </a>
    </header>

    <div class="element-grid">
        @foreach($elements as $element)
            <div class="element-card">
                <div class="element-card-content">
                    <h2 class="element-card-title">{{ $element->nom }}</h2>
                    <p class="element-card-description">{{ $element->description }}</p>
                    <div class="element-actions">
                        <a href="{{ route('elements.edit', ['category' => $category->id, 'element' => $element->id]) }}" class="button button-small">Modifier</a>
                        <form action="{{ route('elements.destroy', ['category' => $category->id, 'element' => $element->id]) }}" method="POST" class="inline-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button button-small button-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
