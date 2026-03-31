<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    //
    protected $fillable = [
        'nom',
        'adresse',
        'telephone',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'id_entreprise');
    }


    public function postPublications()
    {
        return $this->hasMany(PostPublication::class, 'id_entreprise');
    }


    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class, 'id_entreprise');
    }


    public function userPrivileges()
    {
        return $this->hasMany(UserPrivilege::class, 'id_entreprise');
    }


    public function post_publications()
    {
        return $this->hasMany(PostPublication::class, 'id_entreprise');
    }


    public function social_accounts()
    {
        return $this->hasMany(SocialAccount::class, 'id_entreprise');
    }


    public function user_privileges()
    {
        return $this->hasMany(UserPrivilege::class, 'id_entreprise');
    }

}