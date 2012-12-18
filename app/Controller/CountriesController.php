<?php

App::uses('AppController', 'Controller');

class CountriesController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Countries';
	public $helpers = array('Html', 'Form');
	public $uses = array('Country');

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

}