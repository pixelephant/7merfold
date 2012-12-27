<?php

App::uses('AppController', 'Controller');

class ContinentsController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Continents';
	public $helpers = array('Html', 'Form');
	public $uses = array('Continent', 'ContinentImage');

	/* Admin */

	public function admin_index(){
		$this->paginate = array('limit' => 15);

		$continents = $this->paginate('Continent');

		$this->set('name', 'Kontinensek');
		$this->set('continents', $continents);
	}

	public function admin_new(){

		if(!empty($this->request->data['Continent'])){
			if(isset($this->request->data['Continent']['id'])){
				$this->Continent->findById($this->request->data['Continent']['id']);	
			}else{
				$this->Continent->create();
			}
			$c = $this->Continent->save($this->request->data);
			$this->redirect('/admin/continents/edit/'.$c['Continent']['id']);
		}
	}

	/* Szerkesztés */

	public function admin_edit(){
		$params = $this->request->params;

		$this->request->data = $this->Continent->findById($params['pass'][0]);
		$this->set('continents', $this->Continent->find('list'));

		// $images = $this->ContinentImage->find('all', array('conditions' => array('ContinentImage.Continent_id' => $params['pass'][0])));
		// $this->set('images', $images);
	
	}

}