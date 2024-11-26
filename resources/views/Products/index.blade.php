<table>
    <thead>
        <tr>
            <th>ID Produit</th>
            <th>Prix</th>
            <th>Visible</th>
            <th>Prise</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id_Produit }}</td>
                <td>{{ $product->prix_Produit }}</td>
                <td>{{ $product->visible ? 'Oui' : 'Non' }}</td>
                <td>{{ $product->prise ? 'Oui' : 'Non' }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id_Produit) }}">Voir</a>
                    <a href="{{ route('products.edit', $product->id_Produit) }}">Éditer</a>
                    <form action="{{ route('products.destroy', $product->id_Produit) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
