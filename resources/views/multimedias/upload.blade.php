@extends('layouts.app')

@section('content')
    <div class="upload-section">
        <div class="upload-card">
            <div class="upload-card-header">Upload de fichier pour {{ $element->nom }}</div>

            <div class="upload-card-body">
                @if ($errors->any())
                    <div class="message error">
                        <ul class="error-list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('multimedias.store', $element->id) }}" enctype="multipart/form-data"
                    class="upload-form">
                    @csrf
                    <div class="form-group">
                        <label for="file" class="form-label">Fichier</label>
                        <input type="file" name="file" id="file" class="form-input file-input" required>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-input" rows="3"></textarea>
                    </div>

                    <button type="submit" class="button">Uploader</button>
                </form>
            </div>
        </div>
    </div>
@endsection
