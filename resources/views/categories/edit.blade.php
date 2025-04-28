@extends('layouts.app')

@section('content')
    <div class="form-page">
        <div class="form-card">
            <div class="form-card-header">
                <h1 class="form-title">Modifier la catégorie</h1>
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

                <form method="POST" action="{{ route('categories.update', $category) }}" class="form">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-input @error('nom') input-error @enderror" id="nom"
                            name="nom" value="{{ old('nom', $category->nom) }}" required>
                        @error('nom')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-input @error('description') input-error @enderror" id="description" name="description"
                            rows="3">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="button">Mettre à jour</button>
                        <a href="{{ route('admin.dashboard') }}" class="button button-outline">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
