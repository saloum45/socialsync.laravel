<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    //
    protected $fillable = [
        'id_entreprise',
        'id_user',
        'id_type_social_account',
        'account_id',
        'account_name',
        'access_token',
        'refresh_token',
        'expires_at',
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'id_entreprise');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function typeSocialAccount()
    {
        return $this->belongsTo(TypeSocialAccount::class, 'id_type_social_account');
    }


    public function postPublications()
    {
        return $this->hasMany(PostPublication::class, 'id_social_account');
    }


    public function type_social_account()
    {
        return $this->belongsTo(TypeSocialAccount::class, 'id_type_social_account');
    }


    public function post_publications()
    {
        return $this->hasMany(PostPublication::class, 'id_social_account');
    }

}