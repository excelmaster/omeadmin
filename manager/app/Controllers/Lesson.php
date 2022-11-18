<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LessonModel;

class Lesson extends BaseController
{
    public function index($courseId, $mundoName)
    {
        echo 'lecciones para mundo ' . $courseId;
        $db= \Config\Database::connect();
        $lessonInstance = new  LessonModel($db);
        $lessons = $lessonInstance->readLessonsxCourse($courseId);
        //variables de sesion
        $this->session->set('courseId', $courseId);
        $this->session->set('mundoName', $mundoName);
        //$items = array('le','mundoName');
        //$this->session->remove($items);
        $data = array(
            'lessons' => $lessons,
        );
        return view('lessons/list', $data);
    }
}
