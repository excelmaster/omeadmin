<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityModel extends Model
{
    protected $table      = 'ome_activities';
    protected $primaryKey = 'id';    

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['lessonId', 'activityNumber','img_path','objectId','tipo','url_resources','deleted_at','quiz'];
    
    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function readActivitiesxLesson($lessonId){
        $deletedRows =  $this->where('lessonId',$lessonId)->orderBy('lessonId asc, activityNumber asc')->onlyDeleted()->findAll();
        $activeRows = $this->where('lessonId',$lessonId)->orderBy('lessonId asc, activityNumber asc')->findAll();
        return array_merge($deletedRows,$activeRows);
    }

    public function getActivity($activityId){
        $deletedRows =  $this->where('Id',$activityId)->findAll();        
        return $deletedRows;
    }

    public function getDeletedActivity($activityId){
        $deletedRows =  $this->where('Id',$activityId)->onlyDeleted()->findAll();        
        return $deletedRows;
    }

    public function getActivityImage(){
    $tipos = ['hvp','resources'];
       return $this->distinct()->select('img_path')->orWhereIn('tipo', $tipos)->findAll();
    }

    public function activate($id){        
        $this->set('deleted_at', null);
        $this->where('id', $id );
        $this->update();       
    }
}