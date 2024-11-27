<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * Représente un rôle dans l'application.
 * 
 * @property int $id                  Identifiant unique du rôle.
 * @property string $name             Nom du rôle.
 *
 * @package App\Models
 */
class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Le nom du rôle est assignable en masse
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id_role'); // Un rôle peut avoir plusieurs utilisateurs
    }
}
