<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Prise
 * 
 * @property string $id_Prise
 * @property string $id_Logement
 * 
 * @property Logement $logement
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Prise extends Model
{
	#protected $table = 'Elle_prises';
	protected $primaryKey = 'id_Prise';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'id_Logement'
	];

	public function logement()
	{
		return $this->belongsTo(Logement::class, 'id_Logement');
	}

	public function orders()
	{
		return $this->hasMany(Order::class, 'id_Prise');
	}
}
