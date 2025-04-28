@extends('layouts.app')

@section('content')
    <div class="form-page">
        <div class="form-card">
            <div class="form-card-header">
                <h1 class="form-title">Ajouter un élément à {{ $category->nom }}</h1>
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

                <form method="POST" action="{{ route('elements.store', ['category' => $category->id]) }}" class="form"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-input @error('nom') input-error @enderror" id="nom"
                            name="nom" value="{{ old('nom') }}" required autofocus>
                        @error('nom')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-input @error('description') input-error @enderror" id="description" name="description"
                            rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file" class="form-label">Fichier multimédia (optionnel)</label>
                        <input type="file" name="file" id="file" class="form-input"
                            accept="image/*,video/*,audio/*">
                        @error('file')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <small class="form-help" style="color: #666; margin-top: 0.25rem; display: block;">
                            Formats acceptés : images (jpg, png, gif), audio (mp3, wav), vidéo (mp4, mov, avi)
                        </small>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="button">Créer l'élément</button>
                        <a href="{{ route('admin.dashboard') }}" class="button button-outline">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
