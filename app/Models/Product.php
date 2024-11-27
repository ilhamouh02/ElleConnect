<?php

/**
 * Created by Reliese Model.
 */

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

    #protected $table = 'Products';
    protected $primaryKey = 'id_Produit';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

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