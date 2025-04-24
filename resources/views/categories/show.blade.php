@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Catégories</a></li>
            <li class="breadcrumb-item active">{{ $categorie->nom }}</li>
        </ol>
    </nav>

    <h1 class="mb-4">{{ $categorie->nom }}</h1>
    <p class="lead">{{ $categorie->description }}</p>

    <div class="row">
        @foreach($categorie->elements as $element)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($element->multimedias->where('type', 'image')->first())
                        <img src="{{ asset($element->multimedias->where('type', 'image')->first()->fichier) }}" 
                             class="card-img-top" alt="{{ $element->nom }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $element->nom }}</h5>
                        <p class="card-text">{{ $element->description }}</p>
                        <a href="{{ route('elements.show', [$categorie->id, $element->id]) }}" class="btn btn-primary">
                            Découvrir
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection