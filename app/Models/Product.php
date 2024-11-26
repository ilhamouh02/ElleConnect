<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

// use Illuminate\Database\Eloquent\Collection;
// use Illuminate\Database\Eloquent\Model;
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
 
	 // Nom de la table si ce n'est pas celui par défaut
    #protected $table = 'Products';

    #protected $primaryKey = 'id_Produit';

    protected $fillable = [
        'id_Produit', // L'ID du produit
        'prix_Produit', // Le prix
        'visible', // Si le produit est visible
        'prise', // Si le produit est pris en compte
    ];
 }





// class Product extends Model
// {
// 	protected $table = 'Elle_products';
// 	protected $primaryKey = 'id_Produit';
// 	public $incrementing = false;
// 	public $timestamps = false;

// 	protected $casts = [
// 		'prix_Produit' => 'float',
// 		'visible' => 'bool',
// 		'prise' => 'bool'
// 	];

// 	protected $fillable = [
// 		'prix_Produit',
// 		'visible',
// 		'prise'
// 	];

// 	public function contenirs()
// 	{
// 		return $this->hasMany(Contenir::class, 'id_Produit');
// 	}
// }
