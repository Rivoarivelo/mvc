<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\PropositionModel;

class ArticleController extends BaseController
{
    public function index()
{
    $model = new ArticleModel();
    $data['articles'] = $model->findAll(); // récupère tous les articles
    return view('articles_view', $data);
}


    public function add()
    {
        $model = new ArticleModel();

        $file = $this->request->getFile('photo');
        if ($file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move(FCPATH.'uploads', $newName); // <-- FCPATH pointe vers le dossier public
}


        $model->save([
            'nom' => $this->request->getPost('nom'),
            'prix' => $this->request->getPost('prix'),
            'description' => $this->request->getPost('description'),
            'photo' => $newName
        ]);

        return redirect()->to('/articles'); // <-- redirection vers index
    }

    public function delete($id)
    {
        $model = new ArticleModel();
        $model->delete($id);
        return redirect()->to('/articles');
    }
    public function acheter($id)
{
    $model = new ArticleModel();
    $article = $model->find($id);

    if($article && $article['status'] === 'disponible'){
        $model->update($id, ['status' => 'vendu']);
    }

    return redirect()->to('/articles');
}
public function echanger($id)
{
    $articleModel = new ArticleModel();
    $propositionModel = new PropositionModel();

    $article = $articleModel->find($id);

    if($article && $article['status'] === 'disponible'){
        $valeurProposee = (float)$this->request->getPost('valeur_objet');

        // Vérification ±20%
        if($valeurProposee >= $article['prix']*0.8 && $valeurProposee <= $article['prix']*1.2){

            // Upload de la photo
            $file = $this->request->getFile('photo_objet');
            if ($file->isValid() && !$file->hasMoved()) {
                $photoName = $file->getRandomName();
                $file->move(FCPATH.'uploads', $photoName);
            }

            // Sauvegarder la proposition
            $propositionModel->insert([
                'article_id' => $id,
                'nom' => $this->request->getPost('nom_objet'),
                'description' => $this->request->getPost('description_objet'),
                'valeur' => $valeurProposee,
                'photo' => $photoName,
                'status' => 'accepte'
            ]);

            // Changer l’état de l’article
            $articleModel->update($id, ['status' => 'echange']);

            session()->setFlashdata('message', 'Échange accepté !');

        } else {
            session()->setFlashdata('message', 'Échange refusé : valeur trop différente.');
        }
    }

    return redirect()->to('/articles');
}


}
