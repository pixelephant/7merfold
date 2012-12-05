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

	public $name = 'Trips';
	public $uses = array('Trip');
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
		$trip_id = (int)$params['trip_id'];

		$trip = $this->Trip->find('first', array('conditions' => array('Trip.id' => $trip_id)));

		$trip_type = $trip['Trip']['category_id'];

		$this->set('trip', $trip);
		$this->set('trip_type', $trip_type);

		$this->Session->write('quote_text', $trip['Trip']['name']);

		$this->render('show');
	}
}
