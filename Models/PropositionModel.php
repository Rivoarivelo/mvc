<?php

namespace App\Models;

use CodeIgniter\Model;

class PropositionModel extends Model
{
    protected $table = 'propositions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['article_id', 'nom', 'description', 'photo', 'valeur', 'status', 'created_at'];
}
