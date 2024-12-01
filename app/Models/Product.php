<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property string $id_Produit
 * @property float $prix_Produit
 * @property bool $visible
 * @property bool $prise
 * 
 * @property Collection|Contenir[] $contenirs
 *
 * @package App\Models
 */
class Product extends Model
{
    use HasFactory;

    // Si le nom de la table est 'products', il n'est pas nécessaire de le spécifier
    // Laravel l'utilise par défaut.
    #protected $table = 'products'; // Assurez-vous que c'est bien le bon nom de table.

    protected $primaryKey = 'id_Produit';
    public $incrementing = false; // Le champ 'id_Produit' n'est pas un auto-incrément
    protected $keyType = 'string'; // Le type de la clé primaire est 'string'
    public $timestamps = false; // Vous n'utilisez pas de timestamps automatiques

    protected $fillable = [
        'id_Produit',
        'prix_Produit',
        'visible',
        'prise'
    ];

    protected $casts = [
        'prix_Produit' => 'float',
        'visible' => 'boolean',
        'prise' => 'boolean'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'Contenir', 'id_Produit', 'id_Commande')
                    ->withPivot('prix_Produit', 'nom_Produit');
    }
}
