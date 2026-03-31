<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPrivilege extends Model
{
    //
    protected $fillable = [
        'id_user',
        'id_privilege',
        'id_entreprise'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function privilege()
    {
        return $this->belongsTo(Privilege::class, 'id_privilege');
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'id_entreprise');
    }

}
