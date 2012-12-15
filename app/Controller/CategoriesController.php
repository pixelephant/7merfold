<?php

App::uses('AppController', 'Controller');

class CategoriesController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Categories';
	public $uses = array('Category', 'Trip', 'Region', 'Country');
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
		$page_title = $category['Category']['title'];
		$page_keywords = $category['Category']['keywords'];

		$cond = array('Trip.category_id' => $category['Category']['id']);
		if(isset($params['pass'][0])){
			$country = $this->Country->find('first', array('conditions' => array('Country.slug' => $params['country_slug'])));
			$cond['Trip.country_id'] = $country['Country']['id'];
			$breadcrumb[($slug . '/' . $params['country_slug'])] = $country['Country']['name'];
			$page_title .= " - " . $country['Country']['title'];
			$page_keywords .= "," . $country['Country']['keywords'];
		}
		$trips = $this->Trip->find('all', array('conditions' => $cond, 'order' => 'Trip.region_id ASC'));

		$regions = array();

		$regioned = ($category['Category']['id'] == 3 || $category['Category']['id'] == 4) ? true : false;

		if($regioned){
			$regions = $this->Region->find('all', array('conditions' => array('Region.country_id' => $trips[0]['Country']['id'])));	
			$regioned = (count($regions) > 0 ? true : false);
		}
		
		$this->Session->write('quote_text', $category['Category']['name']);

		$this->set('trips', $trips);
		$this->set('regions', $regions);
		$this->set('regioned', $regioned);
		$this->set('category_id', $category['Category']['id']);

		$this->set('breadcrumb', $breadcrumb);
		$this->set('page_title', $page_title);
		$this->set('page_keywords', $page_keywords);

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
		$this->set('page_title', $category['Category']['title']);
		$this->set('page_keywords', $category['Category']['keywords']);

		$this->render('inner');
	}
}