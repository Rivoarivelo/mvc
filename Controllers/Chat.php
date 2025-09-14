<?php

namespace App\Controllers;

use App\Models\MessageModel;
use App\Models\UserModel;
use CodeIgniter\Controller;


class Chat extends Controller
{

    public function index($user1, $user2)
    {
        $model = new MessageModel();
        $userModel    = new UserModel();
        $data['messages'] = $model
            ->where("(sender_id = $user1 AND receiver_id = $user2)
                   OR (sender_id = $user2 AND receiver_id = $user1)")
            ->orderBy('created_at', 'ASC')
            ->findAll();

        // Récupérer les infos utilisateur (nom affiché)
        $user1Data = $userModel->find($user1);
        $user2Data = $userModel->find($user2);

        $data['user1'] = $user1;
        $data['user2'] = $user2;

        $data['user1_name'] = $user1Data ? $user1Data['username'] : "Inconnu ($user1)";
        $data['user2_name'] = $user2Data ? $user2Data['username'] : "Inconnu ($user2)";

        return view('chat_view', $data);
    }

    public function send()
    {
        $model = new MessageModel();

        $model->save([
            'sender_id'   => $this->request->getPost('sender_id'),
            'receiver_id' => $this->request->getPost('receiver_id'),
            'message'     => $this->request->getPost('message'),
            'created_at'  => date('Y-m-d H:i:s')
        ]);

        return redirect()->back();
    }

    public function delete($id)
    {
        $model = new MessageModel();
        $model->delete($id);
        return redirect()->back();
    }
}