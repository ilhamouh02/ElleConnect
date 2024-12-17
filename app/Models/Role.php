<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Role
 * 
 * Représente un rôle dans l'application.
 * 
 * @property int $id_role              Identifiant unique du rôle.
 * @property string $label             Libellé du rôle.
 *
 * @package App\Models
 */
class Role extends Model
{
    // Utilisation du trait pour les fonctionnalités de factory
    use HasFactory;

    // Si vous avez spécifié un nom de table personnalisé, vous pouvez le décommenter.
    // protected $table = 'Roles'; // Nom de la table personnalisé (décommenter si nécessaire)

    /**
     * Clé primaire de la table.
     *
     * @var string
     */
    protected $primaryKey = 'id_role'; // Clé primaire de la table

    /**
     * Indique si les timestamps sont activés.
     *
     * @var bool
     */
    public $timestamps = false; // Désactive les timestamps (created_at et updated_at)

    /**
     * Attributs qui peuvent être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'id_role', // Identifiant du rôle
        'label'    // Libellé du rôle
    ];

    /**
     * Définit la relation avec le modèle User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        // Un rôle peut avoir plusieurs utilisateurs (relation hasMany)
        return $this->hasMany(User::class, 'id_role', 'id_role');
    }
}
