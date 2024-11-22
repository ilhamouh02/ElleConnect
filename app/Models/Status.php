<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * 
 * @property string $id_demande
 * @property bool $demance_Valider
 * @property bool $demand_en_cours
 * @property bool $demande_Terminer
 * 
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Status extends Model
{
	protected $table = 'Elle_status';
	protected $primaryKey = 'id_demande';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'demance_Valider' => 'bool',
		'demand_en_cours' => 'bool',
		'demande_Terminer' => 'bool'
	];

	protected $fillable = [
		'demance_Valider',
		'demand_en_cours',
		'demande_Terminer'
	];

	public function orders()
	{
		return $this->hasMany(Order::class, 'id_demande');
	}
}
