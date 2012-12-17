<?php

App::uses('AppController', 'Controller');

class AdminsController extends AppController {

	public $scaffold = 'admin';
	public $name = 'Admins';
	public $helpers = array('Html', 'Form');

	public function admin_index() {

		$params = $this->request->params;
		$slug = $params['category_slug'];

		$trip = $this->Trip->find('all');

		$this->set('trip', $trip);

		$this->render('index');
	}

}