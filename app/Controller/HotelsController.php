<?php

App::uses('AppController', 'Controller');

class HotelsController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Hotels';
	public $helpers = array('Html', 'Form');

	public function admin_new(){
		if(!empty($this->request->data['Hotel'])){
			$this->Hotel->create();
			$this->Hotel->save($this->request->data);
			$this->redirect('/admin/trips/edit/'.$this->request->data['Hotel']['trip_id']);
		}
	}
}