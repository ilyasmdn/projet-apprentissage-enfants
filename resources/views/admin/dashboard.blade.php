@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Administration</h1>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Gestion des catégories</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
                        Nouvelle catégorie
                    </a>
                    
                    <div class="list-group">
                        @foreach($categories as $categorie)
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">{{ $categorie->nom }}</h6>
                                    <div>
                                        <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-sm btn-outline-primary">Modifier</a>
                                        <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Gestion des éléments</h5>
                </div>
                <div class="card-body">
                    <select class="form-select mb-3" id="categorie-select">
                        <option value="">Sélectionnez une catégorie</option>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                        @endforeach
                    </select>

                    <div id="elements-list">
                        <!-- La liste des éléments sera chargée dynamiquement -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('categorie-select').addEventListener('change', function() {
    const categorieId = this.value;
    if (categorieId) {
        fetch(`/admin/categories/${categorieId}/elements`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('elements-list').innerHTML = html;
            });
    }
});
</script>
@endpush
@endsection