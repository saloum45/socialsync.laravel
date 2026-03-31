<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeSocialAccount extends Model
{
    //
    protected $fillable = [
        'libelle',
        'logo',
        'lien'
    ];

    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class, 'id_type_social_account');
    }


    public function social_accounts()
    {
        return $this->hasMany(SocialAccount::class, 'id_type_social_account');
    }

}