<?php

App::uses('AppController', 'Controller');

class ProgramsController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Programs';
	public $helpers = array('Html', 'Form');

	public function admin_new(){
		if(!empty($this->request->data['Program'])){
			if(isset($this->request->data['Program']['id'])){
				$this->Program->findById($this->request->data['Program']['id']);
			}else{
				$this->Program->create();
			}
			$this->Program->save($this->request->data);
			$this->redirect('/admin/trips/edit/'.$this->request->data['Program']['trip_id']);
		}
	}
}