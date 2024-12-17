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
    // Utilisation des traits pour les fonctionnalités de factory et de notification
    use HasFactory, Notifiable;

    /**
     * Les attributs qui doivent être castés en types natifs.
     *
     * @var array
     */
    protected $casts = [
        // Cast de email_verified_at en datetime
        'email_verified_at' => 'datetime',
        // Assurez que id_role est traité comme un entier
        'id_role' => 'int'
    ];

    /**
     * Les attributs qui doivent être cachés lors de la conversion en tableau ou JSON.
     *
     * @var array
     */
    protected $hidden = [
        // Mot de passe (doit être caché pour des raisons de sécurité)
        'password',
        // Jeton pour se souvenir de l'utilisateur (doit être caché pour des raisons de sécurité)
        'remember_token'
    ];

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        // Prénom de l'utilisateur
        'name',
        // Nom de famille de l'utilisateur
        'prenom',
        // Adresse e-mail de l'utilisateur
        'email',
        // Mot de passe de l'utilisateur
        'password',
        // Date de vérification de l'e-mail
        'email_verified_at',
        // Jeton pour se souvenir de l'utilisateur
        'remember_token',
        // Date de création du compte
        'created_at',
        // Date de la dernière mise à jour du compte
        'updated_at',
        // Identifiant du rôle associé à l'utilisateur
        'id_role',
        // Identifiant du logement (si applicable)
        'id_Logement'
    ];

    /**
     * Définit la relation avec le modèle Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        // Un utilisateur appartient à un rôle (relation belongsTo)
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }

    /**
     * Vérifie si l'utilisateur a un rôle spécifique.
     *
     * @param string $role Le rôle à vérifier
     * @return bool
     */
    public function hasRole($role)
    {
        // Vérifie si le label du rôle de l'utilisateur correspond au rôle spécifié
        return $this->role && $this->role->label === $role;
    }

    /**
     * Vérifie si l'utilisateur a l'un des rôles spécifiés.
     *
     * @param array $roles Tableau des rôles à vérifier
     * @return bool
     */
    public function hasAnyRole(array $roles)
    {
        // Vérifie si le label du rôle de l'utilisateur est dans le tableau des rôles spécifiés
        return $this->role && in_array($this->role->label, $roles);
    }

    /**
     * Vérifie si l'utilisateur est un Comptable.
     *
     * @return bool
     */
    public function isComptable()
    {
        // Utilise la méthode hasRole pour vérifier le rôle 'Comptable'
        return $this->hasRole('Comptable');
    }

    /**
     * Vérifie si l'utilisateur est un Admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        // Utilise la méthode hasRole pour vérifier le rôle 'Admin'
        return $this->hasRole('Admin');
    }

    /**
     * Vérifie si l'utilisateur est un Utilisateur.
     *
     * @return bool
     */
    public function isUser()
    {
        // Utilise la méthode hasRole pour vérifier le rôle 'Utilisateur'
        return $this->hasRole('Utilisateur');
    }

    /**
     * Vérifie si l'utilisateur est un Technicien réseau.
     *
     * @return bool
     */
    public function isTechnicien()
    {
        // Utilise la méthode hasRole pour vérifier le rôle 'Technicien réseau'
        return $this->hasRole('Technicien réseau');
    }

    /**
     * Vérifie si l'utilisateur est un Responsable de résidence.
     *
     * @return bool
     */
    public function isResponsable()
    {
        // Utilise la méthode hasRole pour vérifier le rôle 'Responsable de résidence'
        return $this->hasRole('Responsable de résidence');
    }

    /**
     * Vérifie si l'utilisateur est un Etudiant de résidence.
     *
     * @return bool
     */
    public function isEtudiant()
    {
        // Utilise la méthode hasRole pour vérifier le rôle 'Etudiant de résidence'
        //
       
        return $this->id_role === Role::where('label', 'Etudiant')->first()->id_role;
       
        //return $this->hasRole('Etudiant de résidence');
    }


}
