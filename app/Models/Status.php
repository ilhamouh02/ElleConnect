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

    protected $table = 'status';
    protected $primaryKey = 'id_Status';
    public $timestamps = false;

    protected $fillable = [
        'demance_Valider',
        'demand_en_cours',
        'demande_Terminer',
        'label',
    ];

    protected $casts = [
        'demance_Valider' => 'boolean',
        'demand_en_cours' => 'boolean',
        'demande_Terminer' => 'boolean',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_Status', 'id_Status');
    }
}

	