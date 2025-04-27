@extends('layouts.app')

@section('content')
<div class="dashboard">
    <h1 class="dashboard-title">Tableau de bord</h1>
    
    <div class="dashboard-grid">
        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <h2 class="dashboard-card-title">Gestion des catégories</h2>
            </div>
            <div class="dashboard-card-body">
                <a href="{{ route('categories.create') }}" class="button">
                    <i class="fas fa-plus"></i> Nouvelle catégorie
                </a>
                
                @if($categories->count() > 0)
                    <div class="table-wrapper">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $categorie)
                                    <tr>
                                        <td>{{ $categorie->nom }}</td>
                                        <td class="actions-cell">
                                            <a href="{{ route('categories.edit', ['category' => $categorie->id]) }}" class="button button-small button-outline">Modifier</a>
                                            <form action="{{ route('categories.destroy', ['category' => $categorie->id]) }}" method="POST" class="inline-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="button button-small button-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="empty-message">Aucune catégorie trouvée.</p>
                @endif
            </div>
        </div>

        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <h2 class="dashboard-card-title">Gestion des éléments</h2>
            </div>
            <div class="dashboard-card-body">
                <div class="element-list">
                    @foreach($categories as $categorie)
                        <div class="element-section">
                            <h3 class="element-section-title">{{ $categorie->nom }}</h3>
                            <a href="{{ route('elements.create', ['category' => $categorie->id]) }}" class="button button-outline">
                                <i class="fas fa-plus"></i> Ajouter un élément
                            </a>
                            
                            @if($categorie->elements->count() > 0)
                                <ul class="element-items">
                                    @foreach($categorie->elements as $element)
                                        <li class="element-item">
                                            <span>{{ $element->nom }}</span>
                                            <div class="element-actions">
                                                <a href="{{ route('elements.edit', ['category' => $categorie->id, 'element' => $element->id]) }}" class="button button-small">Modifier</a>
                                                <form action="{{ route('elements.destroy', ['category' => $categorie->id, 'element' => $element->id]) }}" method="POST" class="inline-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="button button-small button-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')">Supprimer</button>
                                                </form>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="empty-message">Aucun élément dans cette catégorie.</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection