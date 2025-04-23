@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload de fichier pour {{ $element->nom }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('elements.upload', [$category->id, $element->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="file">Fichier (Images: jpg, png, jpeg | Vidéos: mp4 | Audio: mp3, wav)</label>
                            <input type="file" class="form-control-file" id="file" name="file" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Uploader</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection