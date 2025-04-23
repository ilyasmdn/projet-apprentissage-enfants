<div class="mt-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="mb-0">Éléments de la catégorie</h6>
        <a href="{{ route('elements.create') }}" class="btn btn-sm btn-primary">Nouvel élément</a>
    </div>
    
    <div class="list-group">
        @forelse($elements as $element)
            <div class="list-group-item">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-1">{{ $element->nom }}</h6>
                        <small class="text-muted">{{ $element->description }}</small>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('elements.upload.form', [$element->categorie_id, $element->id]) }}" 
                           class="btn btn-sm btn-outline-success">
                            Ajouter média
                        </a>
                        <a href="{{ route('elements.edit', [$element->categorie_id, $element->id]) }}" 
                           class="btn btn-sm btn-outline-primary">
                            Modifier
                        </a>
                        <form action="{{ route('elements.destroy', [$element->categorie_id, $element->id]) }}" 
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" 
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
                
                @if($element->multimedias->count() > 0)
                    <div class="mt-2">
                        <small class="text-muted">Fichiers multimédias : {{ $element->multimedias->count() }}</small>
                    </div>
                @endif
            </div>
        @empty
            <div class="list-group-item text-center text-muted">
                Aucun élément dans cette catégorie
            </div>
        @endforelse
    </div>
</div>