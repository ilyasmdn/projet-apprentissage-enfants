@extends('layouts.app')
@php
    use Illuminate\Support\Str;
@endphp

@section('content')
    <div class="form-page">
        <div class="form-card">
            <div class="form-card-header">
                <h1 class="form-title">Modifier l'élément {{ $element->nom }}</h1>
            </div>

            <div class="form-card-body">
                @if ($errors->any())
                    <div class="message error">
                        <ul class="error-list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST"
                    action="{{ route('elements.update', ['category' => $category->id, 'element' => $element->id]) }}"
                    class="form">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-input @error('nom') input-error @enderror" id="nom"
                            name="nom" value="{{ old('nom', $element->nom) }}" required>
                        @error('nom')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-input @error('description') input-error @enderror" id="description" name="description"
                            rows="3">{{ old('description', $element->description) }}</textarea>
                        @error('description')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="button">Mettre à jour</button>
                        <a href="{{ route('admin.dashboard') }}" class="button button-outline">Annuler</a>
                    </div>
                </form>

                <div class="media-section" style="margin-top: 2rem; border-top: 1px solid #eee; padding-top: 2rem;">
                    <h2 class="media-title">Fichiers multimédias</h2>

                    <form method="POST"
                        action="{{ route('elements.upload', ['category' => $category->id, 'element' => $element->id]) }}"
                        enctype="multipart/form-data" class="form" style="margin-top: 1rem;">
                        @csrf

                        <div class="form-group">
                            <label for="file" class="form-label">Ajouter un fichier</label>
                            <input type="file" name="file" id="file" class="form-input" required
                                accept="image/*,video/*,audio/*">
                        </div>

                        <button type="submit" class="button">Uploader</button>
                    </form>

                    @if ($element->multimedias->isNotEmpty())
                        <div class="media-grid"
                            style="margin-top: 1rem; display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem;">
                            @foreach ($element->multimedias as $media)
                                <div class="media-card"
                                    style="border: 1px solid #eee; border-radius: 8px; overflow: hidden;">
                                    @if (Str::endsWith(strtolower($media->chemin), ['.jpg', '.jpeg', '.png', '.gif']))
                                        <img src="{{ asset('storage/' . $media->chemin) }}" alt="Media"
                                            style="width: 100%; height: 150px; object-fit: cover;">
                                    @elseif(Str::endsWith(strtolower($media->chemin), ['.mp3', '.wav', '.ogg']))
                                        <div
                                            style="width: 100%; height: 150px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; flex-direction: column;">
                                            <i class="fas fa-music fa-3x"></i>
                                            <audio controls style="width: 90%; margin-top: 10px;">
                                                <source src="{{ asset('storage/' . $media->chemin) }}" type="audio/mpeg">
                                                Votre navigateur ne supporte pas la lecture audio.
                                            </audio>
                                        </div>
                                    @elseif(Str::endsWith(strtolower($media->chemin), ['.mp4', '.mov', '.avi']))
                                        <div
                                            style="width: 100%; height: 150px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; flex-direction: column;">
                                            <i class="fas fa-video fa-3x"></i>
                                            <video controls style="width: 90%; max-height: 120px; margin-top: 10px;">
                                                <source src="{{ asset('storage/' . $media->chemin) }}" type="video/mp4">
                                                Votre navigateur ne supporte pas la lecture vidéo.
                                            </video>
                                        </div>
                                    @else
                                        <div
                                            style="width: 100%; height: 150px; background: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-file fa-3x"></i>
                                        </div>
                                    @endif
                                    <div style="padding: 0.5rem;">
                                        <form
                                            action="{{ route('multimedias.destroy', ['category' => $category->id, 'multimedia' => $media->id]) }}"
                                            method="POST" class="inline-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="button button-small button-danger"
                                                style="width: 100%;"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce fichier ?')">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p style="margin-top: 1rem; color: #666;">Aucun fichier multimédia n'a été ajouté à cet élément.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
