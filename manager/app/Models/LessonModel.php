<?php

namespace App\Models;

use CodeIgniter\Model;

class LessonModel extends Model
{
    protected $table      = 'ome_lessons';
    protected $primaryKey = 'id';    

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['courseId', 'lesson_number','img_url'];
    
    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    
    public function readLessonsxCourse($courseId){
        return $this->where('courseId',$courseId)->orderBy('lesson_number','asc')->findAll();
    }
}