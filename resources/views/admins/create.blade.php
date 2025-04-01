@extends('layouts.app')

@section('content')
    <h1>Ajouter un Administrateur</h1>

    <form action="{{ route('admins.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" class="form-control" id="nom" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div class="form-group">
            <label for="mot_de_passe">Mot de passe</label>
            <input type="password" name="mot_de_passe" class="form-control" id="mot_de_passe" required>
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
    </form>
@endsection
