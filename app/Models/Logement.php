<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Logement
 * 
 * @property string $id_Logement
 * @property int $nb_Lit
 * 
 * @property Collection|Prise[] $prises
 *
 * @package App\Models
 */
class Logement extends Model
{
	protected $table = 'Elle_logements';
	protected $primaryKey = 'id_Logement';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'nb_Lit' => 'int'
	];

	protected $fillable = [
		'nb_Lit'
	];

	public function prises()
	{
		return $this->hasMany(Prise::class, 'id_Logement');
	}
}
