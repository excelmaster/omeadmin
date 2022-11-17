<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityModel extends Model
{
    protected $table      = 'ome_activities';
    protected $primaryKey = 'id';    

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['lessonId', 'activityNumber','img_path','objectId','tipo','url_resources'];
    
    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function readActivitiesxLesson($lessonId){
        return $this->where('lessonId',$lessonId)->orderBy('activityNumber','asc')->findAll();
    }

    public function getActivityImage(){
    $tipos = ['hvp','resources'];
       return $this->distinct()->select('img_path')->orWhereIn('tipo', $tipos)->findAll();
    }
}