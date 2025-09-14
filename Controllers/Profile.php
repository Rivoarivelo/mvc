<?php
namespace App\Controllers;
use App\Models\UserModel;

class Profile extends BaseController
{
    public function index($id = 1) // profil utilisateur 1 par défaut
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);

        return view('profile_view', $data);
    }
}
