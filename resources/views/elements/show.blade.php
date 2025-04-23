@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Catégories</a></li>
            <li class="breadcrumb-item"><a href="{{ route('categories.show', $element->categorie->id) }}">{{ $element->categorie->nom }}</a></li>
            <li class="breadcrumb-item active">{{ $element->nom }}</li>
        </ol>
    </nav>

    <h1 class="mb-4">{{ $element->nom }}</h1>
    <p class="lead">{{ $element->description }}</p>

    <div class="row">
        <!-- Images -->
        @foreach($element->multimedias->where('type', 'image') as $image)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset($image->fichier) }}" class="card-img-top" alt="{{ $element->nom }}">
                </div>
            </div>
        @endforeach

        <!-- Vidéos -->
        @foreach($element->multimedias->where('type', 'video') as $video)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <video controls class="w-100">
                            <source src="{{ asset($video->fichier) }}" type="video/mp4">
                            Votre navigateur ne supporte pas la lecture de vidéos.
                        </video>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Audio -->
        @foreach($element->multimedias->where('type', 'audio') as $audio)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <audio controls class="w-100">
                            <source src="{{ asset($audio->fichier) }}" type="audio/mpeg">
                            Votre navigateur ne supporte pas la lecture audio.
                        </audio>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection