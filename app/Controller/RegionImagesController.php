<?php

App::uses('AppController', 'Controller');

class RegionImagesController extends AppController {

	public $scaffold = 'admin';
	public $name = 'RegionImages';
	public $helpers = array('Html', 'Form');

	public function admin_new(){
		if(!empty($this->request->data['RegionImage'])){
			if(isset($this->request->data['RegionImage']['id'])){
				$this->RegionImage->findById($this->request->data['RegionImage']['id']);
			}else{
				$this->RegionImage->create();
			}
			$this->RegionImage->save($this->request->data);
			$this->redirect('/admin/regions/edit/'.$this->request->data['RegionImage']['region_id']);
		}
	}

	public function admin_delete(){
		$params = $this->request->params;
		$region_image = $this->RegionImage->find('first', array('conditions' => array('RegionImage.id' => $params['pass'][0])));
		$this->RegionImage->delete($params['pass'][0]);
		$this->redirect('/admin/regions/edit/'.$region_image['RegionImage']['region_id']);
	}
}