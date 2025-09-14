<?php
namespace App\Controllers;
use App\Models\PersonnelModel;
class Personne extends BaseController
{
    public function index()
    {
        $model = model(PersonnelModel::class);
        $data['personnes']=$model->getPersonnes();
        return view('formulaire',$data);
    }
    public function ajouter()
    {

        $nom = $this->request->getPost('nom');
        $prenom = $this->request->getPost('prenom');
        $age = $this->request->getPost('age');

        if (!empty($nom) && !empty($prenom) && !empty($age)){
            $model = model(PersonnelModel::class);
            $data = [
                'nom'=>$nom,
                'prenom'=>$prenom,
                'age'=>$age
            ];
            $model->insert($data);
        }
        return redirect()->to('/personne');
    }



    public function modifier($id = null)
    {
        $model = model(PersonnelModel::class);
        $data['personne']=$model->getPersonne($id);
        if (!$data['personne']){
            return redirect()->to('/personne');
        }
        return view('modifier_personne',$data);
    }
    public function postModifier($id)
    {
        $model = model(PersonnelModel::class);
        $data=[
            'nom' => $this->request->getPost('nom'),
            'prenom' => $this->request->getPost('prenom'),
            'age' => $this->request->getPost('age')
        ];
        if (!empty($data['nom']) && !empty($data['prenom']) && !empty($data['age'])){
            $model->updatePersonne($id,$data);
        }
        return redirect()->to('/personne');
    }
    public function supprimer($id){
        $model = model(PersonnelModel::class);
        $model->deletePersonne(($id));
        return redirect()->to('/personne');
    }

    public function ajouterArticle(){

        $data = [
            'titre' =>$this->request->getPost('titre'),
            'prix' =>$this->request->getPost('prix'),
        ];

        return redirect()->to('/');
        
    }
}