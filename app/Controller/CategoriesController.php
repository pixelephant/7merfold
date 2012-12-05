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
class CategoriesController extends AppController {

	public $name = 'Categories';
	public $uses = array('Trip', 'Category', 'Region');
	public $helpers = array('Html', 'Form');

	public function index() {
		$this->render('index');
	}

	public function show() {

		$params = $this->request->params;
		$slug = $params['category_slug'];

		$category = $this->Category->find('first', array('conditions' => array('Category.slug' => $slug)));
		$trips = $this->Trip->find('all', array('conditions' => array('Trip.category_id' => $category['Category']['id']), 'order' => 'Trip.region_id ASC'));

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

		$this->render('show');
	}
}

