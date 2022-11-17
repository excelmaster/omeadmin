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
		$activity = $activityInstance->asObject()->find($id);
		if ($activity == null) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
		$images = $activityInstance->getActivityImage();
		$mundos = array('TEENS', 'KIDS');
		$tipos = array('IRREGULAR', 'REGULAR', 'PHRASAL');
		$tools = array('HVP', 'PDF', 'RESOURCE');
		var_dump(substr($tipos[0], 0, 3));
		$data = array(
			'activity' => $activity,
			'mundos' => $mundos,
			'tipos' => $tipos,
			'images' => $images,
			'tools' => $tools
		);
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
			'lessonId' => $this->request->getPost('lessonId'),
			'activityNumber' => $this->request->getPost('activityNumber'),
			'img_path' => $this->request->getPost('image'),
			'objectId' => $this->request->getPost('objectId'),
			'tipo' => strtolower($this->request->getPost('tipo')),
			'descripcion' => $this->request->getPost('url_resources'),
			'url_resources' => $this->request->getPost('url_resources')
		]);

		return redirect()->to('/activities/list/' . $session->get('lessonId') . '/' . $session->get('lesson'));
	}
}
