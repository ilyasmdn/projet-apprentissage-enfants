<?php

@extends('layouts.app')

@section('content')
    <h1>Éléments de la catégorie {{ $category->nom }}</h1>
    <a href="{{ route('elements.create', $category->id) }}" class="btn btn-primary">Ajouter un élément</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($elements as $element)
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->nom }}</td>
                    <td>{{ $element->description }}</td>
                    <td>
                        <a href="{{ route('elements.edit', $element->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('elements.destroy', $element->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
