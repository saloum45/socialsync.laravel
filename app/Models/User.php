<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'prenom',
        'nom',
        'adresse',
        'telephone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'id_user');
    }


    public function postPublications()
    {
        return $this->hasMany(PostPublication::class, 'id_user');
    }


    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class, 'id_user');
    }


    public function userPrivileges()
    {
        return $this->hasMany(UserPrivilege::class, 'id_user');
    }


    public function post_publications()
    {
        return $this->hasMany(PostPublication::class, 'id_user');
    }


    public function social_accounts()
    {
        return $this->hasMany(SocialAccount::class, 'id_user');
    }


    public function user_privileges()
    {
        return $this->hasMany(UserPrivilege::class, 'id_user');
    }

}