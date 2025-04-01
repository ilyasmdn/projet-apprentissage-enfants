<?php

@extends('layouts.app')

@section('content')
    <h1>Modifier l'Administrateur</h1>

    <form action="{{ route('admins.update', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" class="form-control" id="nom" value="{{ $admin->nom }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $admin->email }}" required>
        </div>
        <div class="form-group">
            <label for="mot_de_passe">Mot de passe</label>
            <input type="password" name="mot_de_passe" class="form-control" id="mot_de_passe">
        </div>
        <button type="submit" class="btn btn-warning">Mettre à jour</button>
    </form>
@endsection
