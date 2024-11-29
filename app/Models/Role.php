<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;

class Role extends Model
{
    use HasFactory;

    #protected $table = 'Roles';
    protected $primaryKey = 'id_role';
    public $timestamps = false;

    protected $fillable = [
        'id_role',
        'label'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id_role');
    }
}
