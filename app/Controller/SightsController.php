<?php

App::uses('AppController', 'Controller');

class SightsController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Sights';
	public $helpers = array('Html', 'Form');

	public function admin_new(){
		if(!empty($this->request->data['Sight'])){
			if(isset($this->request->data['Sight']['id'])){
				$this->Sight->findById($this->request->data['Sight']['id']);
			}else{
				$this->Sight->create();
			}
			$this->Sight->save($this->request->data);
			$this->redirect('/admin/trips/edit/'.$this->request->data['Sight']['trip_id']);
		}
	}

	public function admin_delete(){
		$params = $this->request->params;
		$sight = $this->Sight->find('first', array('conditions' => array('Sight.id' => $params['pass'][0])));
		$this->Sight->delete($params['pass'][0]);
		$this->redirect('/admin/trips/edit/'.$sight['Sight']['trip_id']);
	}
}