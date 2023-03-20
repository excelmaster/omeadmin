<?php

namespace App\Controllers;
//defined('BASEPATH') OR exit('No direct script access allowed');
use App\Models\VerbModel;
$db= \Config\Database::connect();

class Verbs extends BaseController
{	
	public function index($site)
	{
		if ($_SESSION['logged'] == 1) {
			$verbos = array(
				'site' => $site
			);
			return view('verbs/index', $verbos);
		} else {
			$this->session->setFlashdata('message', 'No se encuentra logueado en el sistema');
			return redirect()->to('/auth/login');
		}
	}

	public function front($site)
	{
		if ($_SESSION['logged'] == 1) {
			$data = array('site' => $site);
			return view('verbs/front', $data);
		} else {
			$this->session->setFlashdata('message', 'No se encuentra logueado en el sistema');
			return redirect()->to('/auth/login');
		}
	}

	public function list($site, $type)
	{
		if ($_SESSION['logged'] == 1) {
			$verbinstance = new VerbModel($db);
			$criterios = ['mundo' => strtoupper($site), 'tipo' => substr($type, 0, 3)];
			$verbos = $verbinstance->where($criterios)->findAll();
			$data = array(
				'verbos' => $verbos,
				'site' => $site,
				'tipo' => $type
			);
			return view('verbs/list', $data);
		} else {
			$this->session->setFlashdata('message', 'No se encuentra logueado en el sistema');
			return redirect()->to('/auth/login');
		}
	}

	public function show()
	{
		if ($_SESSION['logged'] == 1) {
			$db= \Config\Database::connect();
			$verbinstance = new  VerbModel($db);
			$verbos = $verbinstance->findAll();
			$data = array(
				'verbos' => $verbos,
				'site' => 'teens',
			);
			return view('verbs/show', $data);
		} else {
			$this->session->setFlashdata('message', 'No se encuentra logueado en el sistema');
			return redirect()->to('/auth/login');
		}
	}

	public function new()
	{
		if ($_SESSION['logged'] == 1) {
			return view('verbs/new');
		} else {
			$this->session->setFlashdata('message', 'No se encuentra logueado en el sistema');
			return redirect()->to('/auth/login');
		}
	}

	public function edit($id)
	{
		if ($_SESSION['logged'] == 1) {
			$verbmodel = new verbmodel();
			$verb = $verbmodel->asObject()->find($id);
			if ($verb == null) {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
			$mundos = array('TEENS', 'KIDS');
			$tipos = array('IRREGULAR', 'REGULAR', 'PHRASAL');
			var_dump(substr($tipos[0], 0, 3));
			return view('verbs/edit', ['verb' => $verb, 'mundos' => $mundos, 'tipos' => $tipos]);
		} else {
			$this->session->setFlashdata('message', 'No se encuentra logueado en el sistema');
			return redirect()->to('/auth/login');
		}
	}

	public function create()
	{
		if ($_SESSION['logged'] == 1) {
			$verb = new VerbModel();
			$verb->insert([
				'mundo' => $this->request->getPost('mundo'),
				'tipo' => $this->request->getPost('tipo'),
				'past' => $this->request->getPost('past'),
				'present' => $this->request->getPost('present'),
				'participle' => $this->request->getPost('participle'),
				'significado' => $this->request->getPost('significado'),
				'position' => $this->request->getPost('position')
			]);
			return redirect()->to('/verbs/show');
		} else {
			$this->session->setFlashdata('message', 'No se encuentra logueado en el sistema');
			return redirect()->to('/auth/login');
		}
	}

	public function update($id)
	{
		if ($_SESSION['logged'] == 1) {
			$verbmodel = new VerbModel();
			$verb = $verbmodel->asObject()->find($id);
			if ($verb == null) {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
			$verbmodel->update($id, [
				'mundo' => $this->request->getPost('mundo'),
				'tipo' => $this->request->getPost('tipo'),
				'past' => $this->request->getPost('past'),
				'present' => $this->request->getPost('present'),
				'participle' => $this->request->getPost('participle'),
				'significado' => $this->request->getPost('significado'),
				'position' => $this->request->getPost('position')
			]);

			return redirect()->to('/verbs/show');
		} else {
			$this->session->setFlashdata('message', 'No se encuentra logueado en el sistema');
			return redirect()->to('/auth/login');
		}
	}

	public function delete($id)
	{
		if ($_SESSION['logged'] == 1) {
			$verbmodel = new VerbModel();
			$verb = $verbmodel->asObject()->find($id);
			var_dump($verb);
			/*if($verb == null) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		} */
			$result = $verbmodel->delete($id);
			var_dump($result);
			return redirect()->to('verbs/show');
		} else {
			$this->session->setFlashdata('message', 'No se encuentra logueado en el sistema');
			return redirect()->to('/auth/login');
		}
	}
}
