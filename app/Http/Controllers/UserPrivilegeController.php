<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\GenerateApiResponse;
use App\Models\UserPrivilege;

use Exception;


class UserPrivilegeController extends Controller
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
            $data = UserPrivilege::all();
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
            $userPrivilege = new UserPrivilege();
            $userPrivilege->id_user = $request->id_user;
            $userPrivilege->id_privilege = $request->id_privilege;
            $userPrivilege->id_entreprise = $request->id_entreprise;
            $userPrivilege->save();
                return $this->successResponse($userPrivilege, 'Récupération réussie');

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
            $userPrivilege = UserPrivilege::findOrFail($id);
            $userPrivilege->id_user = $request->id_user;
            $userPrivilege->id_privilege = $request->id_privilege;
            $userPrivilege->id_entreprise = $request->id_entreprise;
            $userPrivilege->save();
                return $this->successResponse($userPrivilege, 'Mise à jour réussie');
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
            $userPrivilege = UserPrivilege::findOrFail($id);
            $userPrivilege->delete();
                return $this->successResponse($userPrivilege, 'Suppression réussie');
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
            $userPrivilege = UserPrivilege::findOrFail($id);
             return $this->successResponse($userPrivilege, 'Ressource trouvée');
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
        $users = \App\Models\User::all();
        $privileges = \App\Models\Privilege::all();
        $entreprises = \App\Models\Entreprise::all();

            return $this->successResponse([
                'users' => $users,
            'privileges' => $privileges,
            'entreprises' => $entreprises
            ], 'Données du formulaire récupérées avec succès');
        } catch (Exception $e) {
            return $this->errorResponse('Erreur lors de la récupération des données du formulaire', 500, $e->getMessage());
        }
    }

    
}