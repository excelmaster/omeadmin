<?php

namespace App\Models;

use CodeIgniter\Model;

class VerbModel extends Model
{
    protected $table      = 'ome_verbs';
    protected $primaryKey = 'id';    

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['mundo', 'tipo','past','present','participle','significado','position'];
    
    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function readVerbs(){
        return $this->findAll();
    }

    public function readVerb($id){
        return $this->find($id);
    }

    public function createVerb($data){
        return $this->insert($data);
    }

    public function deleteVerb($id){
        return $this->delete($id);
    }

    public function updateVerb($id, $data){
        return $this->update($id, $data);
    }
}