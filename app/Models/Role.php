<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    // Si vous avez spécifié un nom de table personnalisé, vous pouvez le décommenter.
    // protected $table = 'Roles';

    protected $primaryKey = 'id_role';
    public $timestamps = false;

    protected $fillable = [
        'id_role',
        'label'
    ];

    // Relation avec le modèle User
    public function users()
    {
        return $this->hasMany(User::class, 'id_role', 'id_role');
    }
}
