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
	public $uses = array('Trip', 'Country', 'Category', 'Region');
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

	/* Callbacks */

	// public function beforeSave($options = array()) {
	//     if (!empty($this->data['Trip']['name']) && !empty($this->data['Event']['enddate'])) {
	//         $this->data['Event']['begindate'] = $this->dateFormatBeforeSave($this->data['Event']['begindate']);
	//         $this->data['Event']['enddate'] = $this->dateFormatBeforeSave($this->data['Event']['enddate']);
	//     }
 	//    	return true;
	// }

}