@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Catégories d'apprentissage</h1>
    
    <div class="row">
        @foreach($categories as $categorie)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $categorie->nom }}</h5>
                        <p class="card-text">{{ $categorie->description }}</p>
                        <a href="{{ route('categories.show', $categorie->id) }}" class="btn btn-primary">
                            Explorer
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
