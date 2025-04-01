@extends('layouts.app')

@section('content')
    <h1>Liste des Administrateurs</h1>
    <a href="{{ route('admins.create') }}" class="btn btn-primary">Ajouter un Administrateur</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->nom }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" style="display:inline;">
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
