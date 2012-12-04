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
		$unit_id = $params['id'];

		$this->render('index');
	}

	public function show() {

		$trip_id = 1;

		$trip = $this->Trip->find('first', array('conditions' => array('Trip.id' => $trip_id)));

		$this->set('trip', $trip);

		$this->render('show');
	}
}
