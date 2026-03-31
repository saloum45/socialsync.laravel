<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    //
    protected $fillable = [
        'libelle',
        'description'
    ];

    public function userPrivileges()
    {
        return $this->hasMany(UserPrivilege::class, 'id_privilege');
    }


    public function user_privileges()
    {
        return $this->hasMany(UserPrivilege::class, 'id_privilege');
    }

}