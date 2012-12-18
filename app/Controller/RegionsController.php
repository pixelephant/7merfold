<?php

App::uses('AppController', 'Controller');

class RegionsController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Regions';
	public $helpers = array('Html', 'Form');
	public $uses = array('Region', 'RegionImage');

	public function show() {

		$params = $this->request->params;
		$region_slug = $params['region_slug'];
		$region = $this->Region->find('first', array('conditions' => array('Region.slug' => $region_slug)));

		$breadcrumb = array(('regio/' . $region_slug) => $region['Region']['name']);

		$this->set('region', $region);
		$this->set('breadcrumb', $breadcrumb);
		$this->set('page_title', $region['Region']['title']);
		$this->set('page_keywords', $region['Region']['keywords']);

		$this->render('show');
	}

	/* Admin */

	public function admin_index(){
		$this->paginate = array('limit' => 2);

		$regions = $this->paginate('Region');

		$this->set('name', 'Régiók');
		$this->set('regions', $regions);
	}

	public function admin_new(){

		if(!empty($this->request->data['Region'])){
			if(isset($this->request->data['Region']['id'])){
				$this->Region->findById($this->request->data['Region']['id']);	
			}else{
				$this->Region->create();
			}
			$c = $this->Region->save($this->request->data);
			$this->redirect('/admin/regions/edit/'.$c['Region']['id']);
		}
	}

	/* Szerkesztés */

	public function admin_edit(){
		$params = $this->request->params;

		$this->request->data = $this->Region->findById($params['pass'][0]);
		// $this->set('regions', $this->Region->find('list'));

		$images = $this->RegionImage->find('all', array('conditions' => array('RegionImage.region_id' => $params['pass'][0])));
		$this->set('images', $images);
	}

	/* Törlés */

	public function admin_delete(){
		$params = $this->request->params;
		$region = $this->Region->find('first', array('conditions' => array('Region.id' => $params['pass'][0])));
		$this->Region->delete($params['pass'][0]);
		$this->redirect('/admin/regions/');
	}

}