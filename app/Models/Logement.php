<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Logement
 * 
 * Représente un logement dans l'application.
 * 
 * @property int $id                  Identifiant unique du logement.
 * @property string $code_logement    Code du logement.
 * @property int $nombre_lits         Nombre de lits dans le logement.
 *
 * @package App\Models
 */
class Logement extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_logement', // Le code du logement est assignable en masse
        'nombre_lits',   // Le nombre de lits est assignable en masse
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'logement_id'); // Un logement peut avoir plusieurs utilisateurs
    }
}
