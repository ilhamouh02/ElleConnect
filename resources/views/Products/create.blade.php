<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <div>
        <label for="id_Produit">ID Produit :</label>
        <input type="text" name="id_Produit" id="id_Produit" value="{{ old('id_Produit') }}" required>
    </div>

    <div>
        <label for="prix_Produit">Prix :</label>
        <input type="number" name="prix_Produit" id="prix_Produit" value="{{ old('prix_Produit') }}" required>
    </div>

    <div>
        <label for="visible">Visible :</label>
        <input type="checkbox" name="visible" id="visible" {{ old('visible') ? 'checked' : '' }} required>
    </div>

    <div>
        <label for="prise">Prise :</label>
        <input type="checkbox" name="prise" id="prise" {{ old('prise') ? 'checked' : '' }} required>
    </div>

    <button type="submit">Créer le produit</button>
</form>
