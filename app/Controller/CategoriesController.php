<?php

App::uses('AppController', 'Controller');

class CategoriesController extends AppController {

	public $name = 'Categories';
	public $uses = array('Trip', 'Category', 'Region', 'Country');
	public $helpers = array('Html', 'Form');

	public function index() {
		$this->render('index');
	}

	public function show() {

		$params = $this->request->params;

		if(isset($params['pass'][0])){
			$slug = $params['pass'][0];
		}else{
			$slug = $params['category_slug'];	
		}

		$category = $this->Category->find('first', array('conditions' => array('Category.slug' => $slug)));

		$breadcrumb = array($slug => $category['Category']['name']);

		$cond = array('Trip.category_id' => $category['Category']['id']);
		if(isset($params['pass'][0])){
			$cond['Trip.country_id'] = $params['country_id'];
			$country = $this->Country->find('first', array('conditions' => array('Country.id' => $params['country_id'])));
			$breadcrumb[($slug . '/' . $params['country_id'])] = $country['Country']['name'];
		}
		$trips = $this->Trip->find('all', array('conditions' => $cond, 'order' => 'Trip.region_id ASC'));

		$regions = array();

		$regioned = ($category['Category']['id'] == 3 || $category['Category']['id'] == 4) ? true : false;

		if($regioned){
			$regions = $this->Region->find('all', array('conditions' => array('Region.country_id' => $trips[0]['Country']['id'])));	
		}
		
		$this->Session->write('quote_text', $category['Category']['name']);

		$this->set('trips', $trips);
		$this->set('regions', $regions);
		$this->set('regioned', $regioned);
		$this->set('category_id', $category['Category']['id']);

		$this->set('breadcrumb', $breadcrumb);

		$this->render('show');
	}

	public function inner() {

		$params = $this->request->params;
		$cat_id = (int)$params['pass'][0];

		$category = $this->Category->find('first', array('conditions' => array('Category.id' => $cat_id)));
		$countries = $this->Trip->find('all', array('conditions' => array('category_id' => $cat_id), 'group' => 'Trip.country_id'));

		$breadcrumb = array($category['Category']['slug'] => $category['Category']['name']);

		$this->Session->write('quote_text', 'Nyaralás');

		$this->set('trips', array());
		$this->set('regions', array());
		$this->set('regioned', false);
		$this->set('countries', $countries);
		$this->set('category', $category);

		$this->set('breadcrumb', $breadcrumb);

		$this->render('inner');
	}
}