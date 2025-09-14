<?php
namespace App\Controllers;
use App\Models\UserModel;

class User extends BaseController
{
public function create()
{
    return view('user_create');
}

public function store()
{
    $userModel = new UserModel();

    $file = $this->request->getFile('avatar');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        $avatarName = $file->getRandomName();
        $file->move(FCPATH.'uploads', $avatarName);
    } else {
        $avatarName = 'default.png';
    }

    $data = [
        'username' => $this->request->getPost('username'),
        'email'    => $this->request->getPost('email'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'bio'      => $this->request->getPost('bio'),
        'avatar'   => $avatarName
    ];

    $id = $userModel->insert($data);

    return redirect()->to("/user/profile/$id");
}


    // Affiche le profil avec les infos
    public function profile($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);

        return view('user_profile', $data);
    }
    public function index()
{
    $userModel = new UserModel();
    $data['users'] = $userModel->findAll();

    return view('user_list', $data);
}
public function edit($id)
{
    $userModel = new UserModel();
    $data['user'] = $userModel->find($id);

    return view('user_edit', $data);
}

public function update($id)
{
    $userModel = new UserModel();

    // récupérer données envoyées
    $data = [
        'username' => $this->request->getPost('username'),
        'email'    => $this->request->getPost('email'),
        'bio'      => $this->request->getPost('bio'),
    ];

    // Vérifier si une image a été uploadée
    $file = $this->request->getFile('avatar');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move(FCPATH . 'uploads', $newName);
        $data['avatar'] = $newName;
    }

    // Mise à jour en base
    $userModel->update($id, $data);

    return redirect()->to("/user/profile/$id");
}
public function delete($id)
{
    $userModel = new UserModel();
    $userModel->delete($id);

    return redirect()->to('/users'); // retour à la liste après suppression
}

public function update_cover($id)
{
    if ($this->request->getMethod() === 'post') {
        $file = $this->request->getFile('cover_image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads', $newName);

            // Mise à jour dans la BDD
            $db = \Config\Database::connect();
            $builder = $db->table('users');
            $builder->where('id', $id);
            $builder->update(['cover_image' => $newName]);
        }
    }

    return redirect()->to('/user/profile/'.$id);
}

}
