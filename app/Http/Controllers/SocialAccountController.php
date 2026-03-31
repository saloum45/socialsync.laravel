<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\GenerateApiResponse;
use App\Models\SocialAccount;
use App\Models\TypeSocialAccount;
use Exception;


class SocialAccountController extends Controller
{
    use GenerateApiResponse;

        /**
     * Displa y a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $data = TypeSocialAccount::with('social_accounts')->get();
            return $this->successResponse($data, 'Récupération réussie');
        } catch (Exception $e) {
            return $this->errorResponse('Récupération échouée', 500, $e->getMessage());
        }
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $socialAccount = new SocialAccount();
            $socialAccount->id_entreprise = $request->id_entreprise;
            $socialAccount->id_user = $request->id_user;
            $socialAccount->id_type_social_account = $request->id_type_social_account;
            $socialAccount->account_id = $request->account_id;
            $socialAccount->account_name = $request->account_name;
            $socialAccount->access_token = $request->access_token;
            $socialAccount->refresh_token = $request->refresh_token;
            $socialAccount->expires_at = $request->expires_at;
            $socialAccount->save();
                return $this->successResponse($socialAccount, 'Récupération réussie');

        } catch (Exception $e) {
            return $this->errorResponse('Insertion échouée', 500, $e->getMessage());
        }
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $socialAccount = SocialAccount::findOrFail($id);
            $socialAccount->id_entreprise = $request->id_entreprise;
            $socialAccount->id_user = $request->id_user;
            $socialAccount->id_type_social_account = $request->id_type_social_account;
            $socialAccount->account_id = $request->account_id;
            $socialAccount->account_name = $request->account_name;
            $socialAccount->access_token = $request->access_token;
            $socialAccount->refresh_token = $request->refresh_token;
            $socialAccount->expires_at = $request->expires_at;
            $socialAccount->save();
                return $this->successResponse($socialAccount, 'Mise à jour réussie');
        } catch (Exception $e) {
            return $this->errorResponse('Mise à jour échouée', 500, $e->getMessage());
        }
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $socialAccount = SocialAccount::findOrFail($id);
            $socialAccount->delete();
                return $this->successResponse($socialAccount, 'Suppression réussie');
        } catch (Exception $e) {
            return $this->errorResponse('Suppression échouée', 500, $e->getMessage());
        }
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $socialAccount = SocialAccount::findOrFail($id);
             return $this->successResponse($socialAccount, 'Ressource trouvée');
        } catch (Exception $e) {
            return $this->errorResponse('Ressource non trouvée', 404, $e->getMessage());
        }
    }

        /**
     * Get related form details for foreign keys.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getformdetails()
    {
        try {
        $entreprises = \App\Models\Entreprise::all();
        $users = \App\Models\User::all();
        $type_social_accounts = \App\Models\TypeSocialAccount::all();

            return $this->successResponse([
                'entreprises' => $entreprises,
            'users' => $users,
            'type_social_accounts' => $type_social_accounts
            ], 'Données du formulaire récupérées avec succès');
        } catch (Exception $e) {
            return $this->errorResponse('Erreur lors de la récupération des données du formulaire', 500, $e->getMessage());
        }
    }


}
