<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostPublicationController;
use App\Http\Controllers\PrivilegeController;
use App\Http\Controllers\SocialAccountController;
use App\Http\Controllers\TypeSocialAccountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPrivilegeController;
use Laravel\Socialite\Socialite;
use App\Models\SocialAccount;

// Routes pour le contrôleur EntrepriseController
Route::get('/entreprises', [EntrepriseController::class, 'index']);
Route::post('/entreprises', [EntrepriseController::class, 'store']);
Route::put('/entreprises/{id}', [EntrepriseController::class, 'update']);
Route::delete('/entreprises/{id}', [EntrepriseController::class, 'destroy']);
Route::get('/entreprises/{id}', [EntrepriseController::class, 'show'])->where('id', '[0-9]+');
Route::get('/entreprises/getformdetails', [EntrepriseController::class, 'getformdetails']);

// Routes pour le contrôleur PostController
Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'store']);
Route::put('/posts/{id}', [PostController::class, 'update']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);
Route::get('/posts/{id}', [PostController::class, 'show'])->where('id', '[0-9]+');
Route::get('/posts/getformdetails', [PostController::class, 'getformdetails']);

// Routes pour le contrôleur PostPublicationController
Route::get('/post_publications', [PostPublicationController::class, 'index']);
Route::post('/post_publications', [PostPublicationController::class, 'store']);
Route::put('/post_publications/{id}', [PostPublicationController::class, 'update']);
Route::delete('/post_publications/{id}', [PostPublicationController::class, 'destroy']);
Route::get('/post_publications/{id}', [PostPublicationController::class, 'show'])->where('id', '[0-9]+');
Route::get('/post_publications/getformdetails', [PostPublicationController::class, 'getformdetails']);

// Routes pour le contrôleur PrivilegeController
Route::get('/privileges', [PrivilegeController::class, 'index']);
Route::post('/privileges', [PrivilegeController::class, 'store']);
Route::put('/privileges/{id}', [PrivilegeController::class, 'update']);
Route::delete('/privileges/{id}', [PrivilegeController::class, 'destroy']);
Route::get('/privileges/{id}', [PrivilegeController::class, 'show'])->where('id', '[0-9]+');
Route::get('/privileges/getformdetails', [PrivilegeController::class, 'getformdetails']);

// Routes pour le contrôleur SocialAccountController
Route::get('/social_accounts', [SocialAccountController::class, 'index']);
Route::post('/social_accounts', [SocialAccountController::class, 'store']);
Route::put('/social_accounts/{id}', [SocialAccountController::class, 'update']);
Route::delete('/social_accounts/{id}', [SocialAccountController::class, 'destroy']);
Route::get('/social_accounts/{id}', [SocialAccountController::class, 'show'])->where('id', '[0-9]+');
Route::get('/social_accounts/getformdetails', [SocialAccountController::class, 'getformdetails']);

// Routes pour le contrôleur TypeSocialAccountController
Route::get('/type_social_accounts', [TypeSocialAccountController::class, 'index']);
Route::post('/type_social_accounts', [TypeSocialAccountController::class, 'store']);
Route::put('/type_social_accounts/{id}', [TypeSocialAccountController::class, 'update']);
Route::delete('/type_social_accounts/{id}', [TypeSocialAccountController::class, 'destroy']);
Route::get('/type_social_accounts/{id}', [TypeSocialAccountController::class, 'show'])->where('id', '[0-9]+');
Route::get('/type_social_accounts/getformdetails', [TypeSocialAccountController::class, 'getformdetails']);

// Routes pour le contrôleur UserController
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::get('/users/{id}', [UserController::class, 'show'])->where('id', '[0-9]+');
Route::get('/users/getformdetails', [UserController::class, 'getformdetails']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

// Routes pour le contrôleur UserPrivilegeController
Route::get('/user_privileges', [UserPrivilegeController::class, 'index']);
Route::post('/user_privileges', [UserPrivilegeController::class, 'store']);
Route::put('/user_privileges/{id}', [UserPrivilegeController::class, 'update']);
Route::delete('/user_privileges/{id}', [UserPrivilegeController::class, 'destroy']);
Route::get('/user_privileges/{id}', [UserPrivilegeController::class, 'show'])->where('id', '[0-9]+');
Route::get('/user_privileges/getformdetails', [UserPrivilegeController::class, 'getformdetails']);


// https://socialsync.chitari.tech/backend/auth/facebook/callback
// https://socialsync.chitari.tech/backend/auth/tiktok/callback


// Facebook
Route::group(['middleware' => ['web']], function () {
    // Facebook
    Route::get('/facebook/auth', function () {
        return Socialite::driver('facebook')->redirect();
        // return Socialite::driver('facebook')->scopes('pages_show_list')->redirect();
    });

    Route::get('/facebook/callback', function (SocialAccountController $social_account) {
        $user = Socialite::driver('facebook')->user();
        // $social_account->store()
        SocialAccount::insert([
            'access_token' => $user->token,
            'refresh_token' => $user->refreshToken,
            'account_name' => $user->name,
            'expires_at' => now()->addDays($user->expiresIn / 86400),
            'account_id' => $user->id,
            'id_type_social_account' => 1,
            'id_entreprise' => 1,
            'id_user' => 1,
        ]);
        // socket_io puis message vous pouvez fermer cette page et revenir sur l'app
        return dd($user);
    });

    // Tiktok
    //    Route::get('/tiktok/auth', function () {
    //         return Socialite::driver('tiktok')->redirect();
    //     });

    //     Route::get('/tiktok/callback', function () {
    //         $user = Socialite::driver('tiktok')->user();
    //         dd($user);
    //     });

    // Linkedin
    Route::get('/linkedin/auth', function () {
        return Socialite::driver('linkedin')->scopes('openid')->redirect();
    });

    Route::get('/linkedin/callback', function () {
        $user = Socialite::driver('linkedin')->user();
        dd($user);
    });
});


// alias /var/www/clients/client1/web25/web/backend/public/;
// index index.php;
