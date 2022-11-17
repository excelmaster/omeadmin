<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ActivityModel;

class Activity extends BaseController
{
    public function index($lessonId,  $leccion){					
            $db= \Config\Database::connect();
			$activityInstance = new  ActivityModel($db);
			$activities = $activityInstance->readActivitiesxLesson($lessonId);
			$this->session->set('lessonId',$lessonId);
			$this->session->set('lesson',$leccion);
			$data = array(
				'activities' => $activities,				
			);			
			return view('activities/list', $data);		
	}
}
