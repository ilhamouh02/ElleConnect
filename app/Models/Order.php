<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_Commande';
    public $timestamps = false;

    protected $fillable = [
        'date_Commande',
        'date_Paiement',
        'date_Livraison',
        'id_Connexion',
        'password_Connexion',
        'id_Status',
        'id_Paiement',
        'id_utilisateur',
        'id_Prise'
    ];

    protected $casts = [
        'date_Commande' => 'datetime',
        'date_Paiement' => 'datetime',
        'date_Livraison' => 'datetime',
    ];

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
        return $this->belongsTo(User::class, 'id_utilisateur', 'id_utilisateur');
    }

    public function prise()
    {
        return $this->belongsTo(Prise::class, 'id_Prise', 'id_Prise');
    }
}
