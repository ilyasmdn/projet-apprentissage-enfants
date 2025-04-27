@extends('layouts.app')

@section('content')
<div class="media-manager">
    <header class="media-header">
        <h1 class="media-title">Fichiers multimédias pour {{ $element->nom }}</h1>
        <a href="{{ route('multimedias.create', $element->id) }}" class="button">
            <i class="fas fa-plus"></i> Ajouter un fichier multimédia
        </a>
    </header>

    <div class="media-list">
        @foreach($multimedias as $media)
            <div class="media-item">
                <div class="media-content">
                    @if($media->type === 'image')
                        <img src="{{ asset('storage/' . $media->chemin) }}" alt="{{ $media->nom }}" class="media-preview">
                    @elseif($media->type === 'audio')
                        <audio controls class="media-preview">
                            <source src="{{ asset('storage/' . $media->chemin) }}" type="audio/mpeg">
                            Votre navigateur ne supporte pas la lecture audio.
                        </audio>
                    @endif
                </div>
                <div class="media-details">
                    <h3>{{ $media->nom }}</h3>
                    <p>{{ $media->description }}</p>
                    <div class="media-actions">
                        <a href="{{ route('multimedias.edit', $media->id) }}" class="button button-small">Modifier</a>
                        <form action="{{ route('multimedias.destroy', $media->id) }}" method="POST" class="inline-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button button-small button-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
