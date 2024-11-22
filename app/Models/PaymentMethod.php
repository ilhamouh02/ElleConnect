<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentMethod
 * 
 * @property string $id_Paiement
 * @property string $payment_type
 * 
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class PaymentMethod extends Model
{
	protected $table = 'Elle_payment_methods';
	protected $primaryKey = 'id_Paiement';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'payment_type'
	];

	public function orders()
	{
		return $this->hasMany(Order::class, 'id_Paiement');
	}
}
