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
}