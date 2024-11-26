<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
	use HasFactory;

	// protected $table = 'Elle_status';
	// protected $primaryKey = 'id_demande';
	// public $incrementing = false;
	// public $timestamps = false;

	// protected $casts = [
	// 	'demance_Valider' => 'bool',
	// 	'demand_en_cours' => 'bool',
	// 	'demande_Terminer' => 'bool'
	// ];

	protected $fillable = [
        'id_Status',
        'demance_Valider',
        'demand_en_cours',
        'demande_Terminer',
        'label'
    ];
	// public function orders()
	// {
	// 	return $this->hasMany(Order::class, 'id_Status');
	// }
	// public function orders()
	// {
	// 	return $this->hasMany(Order::class, 'id_demande');
	// }
}
