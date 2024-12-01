<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Logement extends Model
{
    use HasFactory;

    // Spécifiez le nom de la table si différent de la convention Laravel
   # protected $table = 'Elle_logements';

    // Spécifiez la clé primaire si elle n'est pas 'id'
    protected $primaryKey = 'id_Logement';

    // Indiquez si la clé primaire est auto-incrémentée
    public $incrementing = true;

    // Désactivez les timestamps si la table ne les contient pas
    public $timestamps = false;

    // Les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'nb_Lit',
        // Ajoutez d'autres champs si nécessaire
    ];

    /**
     * Relation avec le modèle User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'id_Logement'); // Un logement peut avoir plusieurs utilisateurs
    }
}
