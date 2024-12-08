<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

// use Carbon\Carbon;
// use Illuminate\Database\Eloquent\Collection;
// use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Order
 * 
 * @property int $id_Commande
 * @property Carbon $date_Commande
 * @property Carbon $date_Paiement
 * @property Carbon $date_Livraison
 * @property string $id_Connexion
 * @property string $password_Connexion
 * @property string $id_demande
 * @property string|null $id_Paiement
 * @property string|null $id_Prise
 * 
 * @property Status $status
 * @property PaymentMethod|null $payment_method
 * @property Prise|null $prise
 * @property Collection|Contenir[] $contenirs
 *
 * @package App\Models
 */

 class Order extends Model
{
    use HasFactory;

    #protected $table = 'Elle_orders'; // Nom de la table
    protected $primaryKey = 'id_Commande'; // Clé primaire
    public $timestamps = false; // Pas de timestamps pour cette table

    protected $fillable = [
        'date_Commande',
        'date_Paiement',
        'date_Livraison',
        'id_Connexion',
        'password_Connexion',
        'id_demande',
        'id_Paiement',
        'id_Prise',
        'id_utilisateur'
    ];

    protected $casts = [
        'date_Commande' => 'datetime',
        'date_Paiement' => 'datetime',
        'date_Livraison' => 'datetime',
    ];

    protected $dates = [
        'date_Commande',
        'date_Paiement',
        'date_Livraison',
    ];

    // Définir les relations
    public function status()
    {
        return $this->belongsTo(Status::class, 'id_demande', 'id_demande');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'id_Paiement', 'id_Paiement');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function prise()
    {
        return $this->belongsTo(Prise::class, 'id_Prise', 'id_Prise');
    }
}