<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenir extends Model
{
    use HasFactory;

    protected $table = 'Contenir'; // Assurez-vous que c'est le bon nom de table
    protected $primaryKey = ['id_Produit', 'id_Commande'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_Produit',
        'id_Commande',
        'prix_Produit',
        'nom_Produit'
    ];

    protected $casts = [
        'prix_Produit' => 'float',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_Produit', 'id_Produit');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_Commande', 'id_Commande');
    }
}