<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentMethod
 * 
 * Représente une méthode de paiement dans l'application.
 * 
 * @property string $id_Paiement       Identifiant unique de la méthode de paiement.
 * @property string $payment_type       Type de paiement.
 *
 * @property \Illuminate\Database\Eloquent\Collection|Order[] $orders
 *
 * @package App\Models
 */
class PaymentMethod extends Model
{
    use HasFactory;

    // Indiquez la table associée si elle n'est pas le pluriel du nom du modèle
   # protected $table = 'Elle_payment_methods';

    // Les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'payment_type',
    ];

    // Spécifiez la clé primaire de la table
    protected $primaryKey = 'id_Paiement';

    // Indiquez si la clé primaire est auto-incrémentée
    public $incrementing = true;

    // Spécifiez le type de la clé primaire (int ou string)
    protected $keyType = 'int'; // Utilisez 'string' si vous utilisez des UUIDs

    // Si vous avez des timestamps (created_at, updated_at) dans votre table
    public $timestamps = true; // Par défaut, il est déjà true, mais vous pouvez le définir explicitement

    /**
     * Relation avec le modèle Order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'id_Paiement', 'id_Paiement'); // Un type de paiement peut avoir plusieurs commandes
    }

}