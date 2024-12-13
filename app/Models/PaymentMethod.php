<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentMethod extends Model
{
    use HasFactory;

    #protected $table = 'Elle_payment_methods';
    protected $primaryKey = 'id_Paiement';
public $incrementing = false;
protected $keyType = 'string';


    protected $fillable = [
        'id_Paiement',
        'payment_type'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_Paiement', 'id_Paiement');
    }
}
