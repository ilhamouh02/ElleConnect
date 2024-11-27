<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * 
 * Représente un utilisateur de l'application.
 * 
 * @property int $id                  Identifiant unique de l'utilisateur.
 * @property string $name             Nom d'affichage de l'utilisateur.
 * @property string $email            Adresse e-mail de l'utilisateur.
 * @property Carbon|null $email_verified_at Date de vérification de l'e-mail.
 * @property string $password         Mot de passe de l'utilisateur (haché).
 * @property string|null $remember_token Jeton pour se souvenir de l'utilisateur.
 * @property Carbon|null $created_at  Date de création du compte.
 * @property Carbon|null $updated_at  Date de la dernière mise à jour du compte.
 * @property string|null $first_name   Prénom de l'utilisateur.
 * @property string|null $last_name    Nom de famille de l'utilisateur.
 * @property string|null $comment      Commentaire ou note sur l'utilisateur.
 * @property int $id_role              Identifiant du rôle associé à l'utilisateur.
 *
 * @property Role $role                Relation avec le modèle Role pour obtenir le rôle.
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable; // Utilisation des traits HasFactory et Notifiable

    // Les attributs qui peuvent être castés en types spécifiques
    protected $casts = [
        'email_verified_at' => 'datetime', // Cast pour la date de vérification d'e-mail
        'id_role' => 'int'                  // Cast pour s'assurer que id_role est traité comme un entier
    ];

    // Les attributs cachés lors de la conversion en tableau ou JSON
    protected $hidden = [
        'password',          // Mot de passe (doit être caché)
        'remember_token'     // Jeton pour se souvenir de l'utilisateur (doit être caché)
    ];

    // Les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'first_name',
        'last_name',
        'comment',
        'id_role'
    ];

    /**
     * Relation avec le modèle Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role'); // Lien avec le modèle Role par id_role
    }

    /**
     * Vérifie si l'utilisateur a un rôle spécifique.
     *
     * @param string $role Le rôle à vérifier
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->role->name === $role; // Vérifie si le nom du rôle correspond au rôle donné
    }

    /**
     * Définition des casts pour les attributs du modèle.
     *
     * @return array
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Cast pour la date d'email vérifié
            'password' => 'hashed',             // Hachage du mot de passe lors de la récupération
        ];
    }
}
