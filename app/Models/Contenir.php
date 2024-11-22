<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contenir
 * 
 * @property string $id_Produit
 * @property int $id_Commande
 * @property float $prix_Produit
 * @property string $nom_Produit
 * 
 * @property Product $product
 * @property Order $order
 *
 * @package App\Models
 */
class Contenir extends Model
{
	protected $table = 'Elle_contenir';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_Commande' => 'int',
		'prix_Produit' => 'float'
	];

	protected $fillable = [
		'prix_Produit',
		'nom_Produit'
	];

	public function product()
	{
		return $this->belongsTo(Product::class, 'id_Produit');
	}

	public function order()
	{
		return $this->belongsTo(Order::class, 'id_Commande');
	}
}
