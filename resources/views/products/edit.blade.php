@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier le produit</h2>
    <form action="{{ route('products.update', $product->id_Produit) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="prix_Produit">Prix</label>
            <input type="number" step="0.01" class="form-control" id="prix_Produit" name="prix_Produit" value="{{ $product->prix_Produit }}" required>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="visible" name="visible" value="1" {{ $product->visible ? 'checked' : '' }}>
            <label class="form-check-label" for="visible">Visible</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="prise" name="prise" value="1" {{ $product->prise ? 'checked' : '' }}>
            <label class="form-check-label" for="prise">Prise</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
    </form>
</div>
@endsection
