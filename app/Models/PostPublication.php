<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostPublication extends Model
{
    //
    protected $fillable = [
        'id_entreprise',
        'id_user',
        'post_id',
        'id_social_account',
        'platform_post_id',
        'status',
        'published_at',
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'id_entreprise');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function socialAccount()
    {
        return $this->belongsTo(SocialAccount::class, 'id_social_account');
    }


    public function social_account()
    {
        return $this->belongsTo(SocialAccount::class, 'id_social_account');
    }

}