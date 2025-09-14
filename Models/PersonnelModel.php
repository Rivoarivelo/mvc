<?php 
namespace App\Models;

use CodeIgniter\Model;

class PersonnelModel extends Model{
    protected $table = 'personnes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nom','prenom','age'];
    protected $returnType = 'object';
    
     
    // @return 
    public function getPersonnes()
    {
        return $this->orderBy('nom','ASC')->findAll();
    }

    public function getPersonne($id)
    {
        return $this->find($id);
    }

    public function updatePersonne($id,$data)
    {
        return $this->update($id,$data);
    }

    public function deletePersonne($id){
        return $this->delete($id);
    }
}