<form action="{{ route('products.update', $product->id_Produit) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="prix_Produit">Prix :</label>
        <input type="number" name="prix_Produit" id="prix_Produit" value="{{ old('prix_Produit', $product->prix_Produit) }}" required>
    </div>

    <div>
        <label for="visible">Visible :</label>
        <input type="checkbox" name="visible" id="visible" {{ old('visible', $product->visible) ? 'checked' : '' }} required>
    </div>

    <div>
        <label for="prise">Prise :</label>
        <input type="checkbox" name="prise" id="prise" {{ old('prise', $product->prise) ? 'checked' : '' }} required>
    </div>

    <button type="submit">Mettre à jour le produit</button>
</form>
