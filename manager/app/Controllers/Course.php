<?php

namespace App\Controllers;
use App\Models\CourseModel;

class Course extends BaseController
{	

	public function index(){
		echo 'lista';		
            $db= \Config\Database::connect();
			$courseInstance = new  CourseModel($db);
			$worlds = $courseInstance->readCourses();
			$data = array(
				'worlds' => $worlds,
			);
			$items = array('lessonId','lesson','course','courseId','mundo','mundoName');
			$this->session->remove($items);
			return view('courses/list', $data);
		
	}
}
