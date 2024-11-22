<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $id_role
 * @property string $label
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'Elle_roles';
	protected $primaryKey = 'id_role';
	public $timestamps = false;

	protected $fillable = [
		'label'
	];
}
