<?php

App::uses('AppController', 'Controller');

class RegionsController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Regions';
	public $helpers = array('Html', 'Form');
	public $uses = array('Region');

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
}