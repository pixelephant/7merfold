<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class TripsController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Trips';
	public $uses = array('Trip', 'Country', 'Category', 'Region', 'Program', 'Hotel', 'Sight', 'TripSight');
	public $helpers = array('Html', 'Form');

	public function index() {

		$params = $this->request->params;
		$slug = $params['category_slug'];

		$trip = $this->Trip->find('all');

		$this->set('trip', $trip);

		$this->render('index');
	}

	public function show() {

		$params = $this->request->params;
		$trip_slug = $params['trip_slug'];

		$trip = $this->Trip->find('first', array('conditions' => array('Trip.slug' => $trip_slug)));

		$trip_type = $trip['Trip']['category_id'];

		$category = $this->Category->find('first', array('conditions' => array('Category.id' => $trip_type)));
		$country = $this->Country->find('first', array('conditions' => array('Country.id' => $trip['Trip']['country_id'])));

		$breadcrumb = array($category['Category']['slug'] => $category['Category']['name']);

		if($trip_type == 3 || $trip_type == 4){
			$breadcrumb[($category['Category']['slug'] . '/' . $country['Country']['slug'])] = $country['Country']['name'];
		}

		$breadcrumb[('utjaink/' . $trip_slug)] = $trip['Trip']['name'];

		$this->set('trip', $trip);
		$this->set('trip_type', $trip_type);
		$this->set('country', $country);

		$this->set('breadcrumb', $breadcrumb);
		$this->set('page_title', $trip['Trip']['title']);
		$this->set('page_keywords', $trip['Trip']['keywords']);

		$this->Session->write('quote_text', $trip['Trip']['name']);

		$this->render('show');
	}

	public function visa_info(){

		$country_id = (int)($this->request->params['country_id']);

		$c = $this->Country->find('first', array('conditions' => array('Country.id' => $country_id)));

		$this->set('content', $c['Country']['visa_info']);
		$this->render('ajax', 'ajax');
	}

	public function country_info(){

		$country_id = (int)($this->request->params['country_id']);

		$c = $this->Country->find('first', array('conditions' => array('Country.id' => $country_id)));

		$this->set('content', $c['Country']['information']);
		$this->render('ajax', 'ajax');
	}

	public function region_info(){

		$region_id = (int)($this->request->params['region_id']);

		$c = $this->Region->find('first', array('conditions' => array('Region.id' => $region_id)));

		$this->set('content', $c['Region']['description']);
		$this->render('ajax', 'ajax');
	}

	/* Admin */

	public function admin_1(){

		$this->paginate = array('conditions' => array('Category.id' => 1), 'limit' => 2);

		$trips = $this->paginate('Trip');

		$this->set('name', 'Városi kalandok');
		$this->set('trips', $trips);
		$this->set('id', '1');
		
	}	

	public function admin_2(){

		$this->paginate = array('conditions' => array('Category.id' => 2), 'limit' => 2);

		$trips = $this->paginate('Trip');

		$this->set('name', 'Körutazások');
		$this->set('trips', $trips);
		$this->set('id', '2');
		
		$this->render('admin_1');
	}	

	public function admin_3(){

		$this->paginate = array('conditions' => array('Category.id' => 3), 'limit' => 2);

		$trips = $this->paginate('Trip');

		$this->set('name', 'Üveghegyen túl');
		$this->set('trips', $trips);
		$this->set('id', '3');
		
		$this->render('admin_1');
	}	

	public function admin_4(){

		$this->paginate = array('conditions' => array('Category.id' => 4), 'limit' => 2);

		$trips = $this->paginate('Trip');

		$this->set('name', 'Üveghegyen innen');
		$this->set('trips', $trips);
		$this->set('id', '4');
		
		$this->render('admin_1');
	}	

	public function admin_5(){

		$this->paginate = array('conditions' => array('Category.id' => 5), 'limit' => 2);

		$trips = $this->paginate('Trip');

		$this->set('name', 'Felfedezőutak');
		$this->set('trips', $trips);
		$this->set('id', '5');
		
		$this->render('admin_1');
	}	

	/* Hozzáadás */ 

	public function admin_new(){

		if(!empty($this->request->data['Trip'])){
			$type = $this->request->data['Trip']['category_id'];
			$this->Trip->create();
			$this->Trip->save($this->request->data);
			$this->set('type', $type);
		}else{
			$type = $_GET['type_id'];

			$scaffoldFields = array('name', 'description', 'short_description', 'price', 'travel_date', 'travel_price_includes', 'country_id', 'region_id');

			$countries = $this->Country->find('list');
			$this->set('countries', $countries);

			reset($countries);
			$c_id = key($countries);
			$regions = $this->Region->find('list', array('conditions' => array('country_id' => $c_id)));

			$this->set('regions', $regions);
			$this->set('scaffoldFields', $scaffoldFields);
			$this->set('type', $type);
		}
	}

	/* Szerkesztés */

	public function admin_edit(){
		$params = $this->request->params;

		$this->request->data = $this->Trip->findById($params['pass'][0]);
		$this->set('countries', $this->Country->find('list'));

		$programs = $this->Program->find('all', array('conditions' => array('Program.trip_id' => $params['pass'][0])));
		$this->set('programs', $programs);

		$hotels = $this->Hotel->find('all', array('conditions' => array('Hotel.trip_id' => $params['pass'][0])));
		$this->set('hotels', $hotels);

		// $sights = $this->Trip->find('all', array('conditions' => array('trip_id' => $params['pass'][0])))->Sight->find('all');
		$sights = array();
		$this->set('sights', $sights);
	}

	/* Törlés */

	public function admin_delete(){
		$params = $this->request->params;
		$trip = $this->Trip->find('first', array('conditions' => array('Trip.id' => $params['pass'][0])));
		$this->Trip->delete($params['pass'][0]);
		$this->redirect('/admin/trips/'.$trip['Trip']['category_id']);
	}

}