<?php

App::uses('AppController', 'Controller');

class CountriesController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Countries';
	public $helpers = array('Html', 'Form');
	public $uses = array('Country', 'CountryImage', 'Continent', 'News');

	public function show() {

		$params = $this->request->params;
		$country_slug = $params['country_slug'];
		$country = $this->Country->find('first', array('conditions' => array('Country.slug' => $country_slug)));

		$breadcrumb = array(('orszag/' . $country_slug) => $country['Country']['name']);

		$this->Session->write('quote_text', $country['Country']['name']);
		$this->Session->write('quote_breadcrumb', $breadcrumb);

		$news = $this->News->find('first', array('order' => 'created'));
		$this->set('news', $news);

		$all_news = $this->News->find('all', array('conditions' => array('NOT' => array('News.slug' => $news['News']['slug']))));
		$this->set('all_news', $all_news);

		$this->set('country', $country);
		$this->set('breadcrumb', $breadcrumb);
		$this->set('page_title', $country['Country']['title']);
		$this->set('page_keywords', $country['Country']['keywords']);

		$this->render('show');
	}

	/* Admin */

	public function admin_index(){
		$this->paginate = array('limit' => 15);

		$countries = $this->paginate('Country');

		$this->set('name', 'Országok');
		$this->set('countries', $countries);
	}

	public function admin_new(){

		if(!empty($this->request->data['Country'])){
			if(isset($this->request->data['Country']['id'])){
				$this->Country->findById($this->request->data['Country']['id']);	
			}else{
				$this->Country->create(array('created' => date("Y-m-d H:i:s")));
			}

			$c = $this->Country->save($this->request->data);
			$this->redirect('/admin/countries/edit/'.$c['Country']['id']);
		}

		$continents = $this->Continent->find('list', array('fields' => array('id','name')));
		$this->set('continents', $continents);
	}

	/* Szerkesztés */

	public function admin_edit(){
		$params = $this->request->params;

		$continents = $this->Continent->find('list', array('fields' => array('id','name')));
		$this->set('continents', $continents);

		$this->request->data = $this->Country->findById($params['pass'][0]);
		$this->set('countries', $this->Country->find('list'));

		$images = $this->CountryImage->find('all', array('conditions' => array('CountryImage.country_id' => $params['pass'][0])));
		$this->set('images', $images);
	
	}

}