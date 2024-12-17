<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * Représente un produit dans l'application.
 * 
 * @property string $id_Produit          Identifiant unique du produit.
 * @property float $prix_Produit         Prix du produit.
 * @property bool $visible               Indique si le produit est visible.
 * @property bool $prise                 Indique si le produit est pris.
 * 
 * @property Collection|Contenir[] $contenirs  Relation avec les contenirs (commandes).
 *
 * @package App\Models
 */
class Product extends Model
{
    // Utilisation du trait pour les fonctionnalités de factory
    use HasFactory;

    // Si le nom de la table est 'products', il n'est pas nécessaire de le spécifier
    // Laravel l'utilise par défaut.
    // protected $table = 'products'; // Assurez-vous que c'est bien le bon nom de table.

    /**
     * Clé primaire de la table.
     *
     * @var string
     */
    protected $primaryKey = 'id_Produit'; // Clé primaire de la table

    /**
     * Indique si la clé primaire est auto-incrémentée.
     *
     * @var bool
     */
    public $incrementing = false; // Le champ 'id_Produit' n'est pas un auto-incrément

    /**
     * Type de la clé primaire.
     *
     * @var string
     */
    protected $keyType = 'string'; // Le type de la clé primaire est 'string'

    /**
     * Indique si les timestamps sont activés.
     *
     * @var bool
     */
    public $timestamps = false; // Vous n'utilisez pas de timestamps automatiques

    /**
     * Attributs qui peuvent être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'id_Produit', // Identifiant du produit
        'prix_Produit', // Prix du produit
        'visible', // Indique si le produit est visible
        'prise' // Indique si le produit est pris
    ];

    /**
     * Attributs qui doivent être castés en types spécifiques.
     *
     * @var array
     */
    protected $casts = [
        'prix_Produit' => 'float', // Cast le prix en float
        'visible' => 'boolean', // Cast la visibilité en boolean
        'prise' => 'boolean' // Cast la prise en boolean
    ];

    /**
     * Définit la relation avec les commandes via la table de jointure Contenir.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        // Un produit peut être associé à plusieurs commandes (relation many-to-many)
        return $this->belongsToMany(Order::class, 'Contenir', 'id_Produit', 'id_Commande')
                    ->withPivot('prix_Produit', 'nom_Produit'); // Inclut les colonnes de jointure dans la relation
    }
}
