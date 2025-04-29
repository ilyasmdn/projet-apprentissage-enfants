@extends('layouts.app')

@section('content')
    <div class="element-detail">
        <header class="element-header">
            <h1 class="element-title">{{ $element->nom }}</h1>
            <a href="{{ route('categories.show', $element->categorie_id) }}" class="button button-link">
                <i class="fas fa-arrow-left"></i> Retour à la catégorie
            </a>
        </header>

        <div class="element-description">
            <p>{{ $element->description }}</p>
        </div>

        <div class="media-grid">
            @foreach ($element->multimedias as $media)
                <div class="media-card">
                    @if ($media->type === 'image')
                        <img src="{{ route('files.show', $media) }}" alt="{{ $element->nom }}" class="media-image">
                    @elseif($media->type === 'audio')
                        <audio controls class="media-audio">
                            <source src="{{ route('files.show', $media) }}" type="audio/mpeg">
                            Votre navigateur ne supporte pas la lecture audio.
                        </audio>
                    @elseif($media->type === 'video')
                        <video controls class="media-video">
                            <source src="{{ route('files.show', $media) }}" type="video/mp4">
                            Votre navigateur ne supporte pas la lecture vidéo.
                        </video>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
