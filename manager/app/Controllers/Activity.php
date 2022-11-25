<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ActivityModel;

class Activity extends BaseController
{
	public function index($lessonId,  $leccion)
	{
		$db = \Config\Database::connect();
		$activityInstance = new  ActivityModel($db);
		$activities = $activityInstance->readActivitiesxLesson($lessonId);
		$this->session->set('lessonId', $lessonId);
		$this->session->set('lesson', $leccion);
		$data = array(
			'activities' => $activities,
		);
		return view('activities/list', $data);
	}

	public function new($lessonId)
	{
		$db = \Config\Database::connect();
		$activityInstance = new  ActivityModel($db);
		$images = $activityInstance->getActivityImage();
		$data = array(
			'lessonId' => $lessonId,
			'images' => $images,
		);
		return view('activities/new', $data);
	}

	public function store()
	{
		$session = session();
		$db = \Config\Database::connect();
		$activity = new  ActivityModel($db);
		var_dump($this->request->getPost('desc'));
		$activity->insert([
			'lessonId' => $this->request->getPost('lessonId'),
			'activityNumber' => $this->request->getPost('activityNumber'),
			'img_path' => $this->request->getPost('image'),
			'objectId' => $this->request->getPost('objectId'),
			'tipo' => $this->request->getPost('tipo'),
			'descripcion' => $this->request->getPost('desc'),
			'url_resources' => $this->request->getPost('url_resources')
		]);
		return redirect()->to('/activities/list/' . $session->get('lessonId') . '/' . $session->get('lesson'));
	}

	public function delete($id)
	{
		$session = session();
		$activityInstance = new ActivityModel();
		$activity = $activityInstance->asObject()->find($id);
		var_dump($activity);
		/*if($verb == null) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		} */
		$result = $activityInstance->delete($id);
		var_dump($result);
		return redirect()->to('/activities/list/' . $session->get('lessonId') . '/' . $session->get('lesson'));
	}

	public function edit($id)
	{
		$activityInstance = new ActivityModel();
		$activity  = $activityInstance->asObject()->find($id);
	
		if ($activity == null) {
			echo "error de ejecucion";	
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		$images = $activityInstance->getActivityImage();
		$mundos = array('TEENS', 'KIDS');		
		$tools = array('HVP', 'PDF', 'RESOURCE');	
		$answers = array('Si','No');	
		$data = array(
			'record' => $activity,
			'activityId' => $id,
			'mundos' => $mundos,			
			'images' => $images,
			'tools' => $tools,
			'answers' => $answers
		);
		//print_r($data);		
		return view('activities/edit', $data);
	}

	public function update($id)
	{
		$session = session();
		$activityInstance = new ActivityModel();
		$activity = $activityInstance->asObject()->find($id);
		if ($activity == null) {			
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		$activityInstance->update($id, [
			'lessonId' => $session->lessonId,
			'activityNumber' => $this->request->getPost('activityNumber'),
			'img_path' => $this->request->getPost('image'),
			'objectId' => $this->request->getPost('objectId'),
			'tipo' => strtolower($this->request->getPost('tipo')),
			'descripcion' => $this->request->getPost('url_resources'),
			'url_resources' => $this->request->getPost('url_resources'),
			'quiz' => $this->request->getPost('quiz'),
		]);

		return redirect()->to('/activities/list/' . $session->get('lessonId') . '/' . $session->get('lesson'));
	}

	public function activate($id)
	{
		$session = Session();
		$activityInstance = new ActivityModel();
		$activityInstance->activate($id);
		return redirect()->to('/activities/list/' . $session->get('lessonId') . '/' . $session->get('lesson'));
	}
}
