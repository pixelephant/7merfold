<?php

App::uses('AppController', 'Controller');

class HotelsController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Hotels';
	public $helpers = array('Html', 'Form');

	public function admin_new(){
		if(!empty($this->request->data['Hotel'])){
			if(isset($this->request->data['Hotel']['id'])){
				$this->Hotel->findById($this->request->data['Hotel']['id']);
			}else{
				$this->Hotel->create();
			}
			$this->Hotel->save($this->request->data);
			$this->redirect('/admin/trips/edit/'.$this->request->data['Hotel']['trip_id']);
		}
	}

	public function admin_delete(){
		$params = $this->request->params;
		$hotel = $this->Hotel->find('first', array('conditions' => array('Hotel.id' => $params['pass'][0])));
		$this->Hotel->delete($params['pass'][0]);
		$this->redirect('/admin/trips/edit/'.$hotel['Hotel']['trip_id']);
	}
}