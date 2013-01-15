<?php

App::uses('AppController', 'Controller');

class ContinentImagesController extends AppController {

	public $scaffold = 'admin';
	public $name = 'ContinentImages';
	public $helpers = array('Html', 'Form');

	public function admin_new(){
		if(!empty($this->request->data['ContinentImage'])){
			if(isset($this->request->data['ContinentImage']['id'])){
				$this->ContinentImage->findById($this->request->data['ContinentImage']['id']);
			}else{
				$this->ContinentImage->create();
			}
			$this->ContinentImage->save($this->request->data);
			$this->redirect('/admin/continents/edit/'.$this->request->data['ContinentImage']['continent_id']);
		}
	}

	public function admin_delete(){
		$params = $this->request->params;
		$continent_image = $this->ContinentImage->find('first', array('conditions' => array('ContinentImage.id' => $params['pass'][0])));
		$this->ContinentImage->delete($params['pass'][0]);
		$this->redirect('/admin/continents/edit/'.$continent_image['ContinentImage']['continent_id']);
	}
}