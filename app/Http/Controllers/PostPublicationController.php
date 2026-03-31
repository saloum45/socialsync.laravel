<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\GenerateApiResponse;
use App\Models\PostPublication;

use Exception;


class PostPublicationController extends Controller
{
    use GenerateApiResponse;

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $data = PostPublication::all();
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
            $postPublication = new PostPublication();
            $postPublication->id_entreprise = $request->id_entreprise;
            $postPublication->id_user = $request->id_user;
            $postPublication->post_id = $request->post_id;
            $postPublication->id_social_account = $request->id_social_account;
            $postPublication->platform_post_id = $request->platform_post_id;
            $postPublication->status = $request->status;
            $postPublication->published_at = $request->published_at;
            $postPublication->save();
                return $this->successResponse($postPublication, 'Récupération réussie');

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
            $postPublication = PostPublication::findOrFail($id);
            $postPublication->id_entreprise = $request->id_entreprise;
            $postPublication->id_user = $request->id_user;
            $postPublication->post_id = $request->post_id;
            $postPublication->id_social_account = $request->id_social_account;
            $postPublication->platform_post_id = $request->platform_post_id;
            $postPublication->status = $request->status;
            $postPublication->published_at = $request->published_at;
            $postPublication->save();
                return $this->successResponse($postPublication, 'Mise à jour réussie');
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
            $postPublication = PostPublication::findOrFail($id);
            $postPublication->delete();
                return $this->successResponse($postPublication, 'Suppression réussie');
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
            $postPublication = PostPublication::findOrFail($id);
             return $this->successResponse($postPublication, 'Ressource trouvée');
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
        $social_accounts = \App\Models\SocialAccount::all();

            return $this->successResponse([
                'entreprises' => $entreprises,
            'users' => $users,
            'social_accounts' => $social_accounts
            ], 'Données du formulaire récupérées avec succès');
        } catch (Exception $e) {
            return $this->errorResponse('Erreur lors de la récupération des données du formulaire', 500, $e->getMessage());
        }
    }

    
}