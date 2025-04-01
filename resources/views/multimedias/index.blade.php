@extends('layouts.app')

@section('content')
    <h1>Multimédias de l'Élément {{ $element->nom }}</h1>
    <a href="{{ route('multimedias.create', $element->id) }}" class="btn btn-primary">Ajouter un fichier multimédia</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Fichier</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($multimedias as $media)
                <tr>
                    <td>{{ $media->id }}</td>
                    <td>{{ $media->type }}</td>
                    <td>{{ $media->fichier }}</td>
                    <td>
                        <a href="{{ route('multimedias.edit', $media->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('multimedias.destroy', $media->id) }}" method="POST" style="display:inline;">
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
