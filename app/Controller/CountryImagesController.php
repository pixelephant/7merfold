<?php

App::uses('AppController', 'Controller');

class CountryImagesController extends AppController {

	public $scaffold = 'admin';
	public $name = 'CountryImages';
	public $helpers = array('Html', 'Form');

	public function admin_new(){
		if(!empty($this->request->data['CountryImage'])){
			if(isset($this->request->data['CountryImage']['id'])){
				$this->CountryImage->findById($this->request->data['CountryImage']['id']);
			}else{
				$this->CountryImage->create();
			}
			$this->CountryImage->save($this->request->data);
			$this->redirect('/admin/countries/edit/'.$this->request->data['CountryImage']['country_id']);
		}
	}

	public function admin_delete(){
		$params = $this->request->params;
		$country_image = $this->CountryImage->find('first', array('conditions' => array('CountryImage.id' => $params['pass'][0])));
		$this->CountryImage->delete($params['pass'][0]);
		$this->redirect('/admin/countries/edit/'.$country_image['CountryImage']['country_id']);
	}
}