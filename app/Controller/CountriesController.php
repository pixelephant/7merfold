<?php

App::uses('AppController', 'Controller');

class CountriesController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Countries';
	public $helpers = array('Html', 'Form');
	public $uses = array('Country', 'CountryImage');

	public function show() {

		$params = $this->request->params;
		$country_slug = $params['country_slug'];
		$country = $this->Country->find('first', array('conditions' => array('Country.slug' => $country_slug)));

		$breadcrumb = array(('orszag/' . $country_slug) => $country['Country']['name']);

		$this->set('country', $country);
		$this->set('breadcrumb', $breadcrumb);
		$this->set('page_title', $country['Country']['title']);
		$this->set('page_keywords', $country['Country']['keywords']);

		$this->render('show');
	}

	/* Admin */

	public function admin_index(){
		$this->paginate = array('limit' => 2);

		$countries = $this->paginate('Country');

		$this->set('name', 'Országok');
		$this->set('countries', $countries);
	}

	public function admin_new(){

		if(!empty($this->request->data['Country'])){
			if(isset($this->request->data['Country']['id'])){
				$this->Country->findById($this->request->data['Country']['id']);	
			}else{
				$this->Country->create();
			}
			$c = $this->Country->save($this->request->data);
			$this->redirect('/admin/countries/edit/'.$c['Country']['id']);
		}
	}

	/* Szerkesztés */

	public function admin_edit(){
		$params = $this->request->params;

		$this->request->data = $this->Country->findById($params['pass'][0]);
		$this->set('countries', $this->Country->find('list'));

		$images = $this->CountryImage->find('all', array('conditions' => array('CountryImage.country_id' => $params['pass'][0])));
		$this->set('images', $images);
	
	}

}