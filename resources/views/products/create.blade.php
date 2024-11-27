@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Créer un nouveau produit</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_Produit">ID Produit</label>
            <input type="text" class="form-control" id="id_Produit" name="id_Produit" required>
        </div>
        <div class="form-group">
            <label for="prix_Produit">Prix</label>
            <input type="number" step="0.01" class="form-control" id="prix_Produit" name="prix_Produit" required>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="visible" name="visible" value="1">
            <label class="form-check-label" for="visible">Visible</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="prise" name="prise" value="1">
            <label class="form-check-label" for="prise">Prise</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Créer</button>
    </form>
</div>
@endsection
