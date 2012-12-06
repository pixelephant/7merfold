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
App::uses('CakeEmail', 'Network/Email');


/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class HomeController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Home';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Trip', 'Category', 'Region', 'News');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function index() {

		$newest_trips = $this->Trip->find('all', array('order' => 'updated desc', 'limit' => 12));
		$news = $this->News->find('all', array('order' => 'created desc', 'limit' => 3));
		$categories_top = $this->Category->find('all', array('limit' => 3));
		$categories_bottom = $this->Category->find('all', array('offset' => 3, 'limit' => 2));

		$this->set('newest_trips', $newest_trips);
		$this->set('news', $news);
		$this->set('categories_top', $categories_top);
		$this->set('categories_bottom', $categories_bottom);

		$this->set('breadcrumb', array());

		$this->render('index');
	}

	public function quote() {
		$this->set('breadcrumb', array());
		$this->set('quote_text', $this->Session->read('quote_text'));
		$this->render('quote');
	}

	public function static_page() {
		$this->set('breadcrumb', array());
		$this->render('static_page');
	}

	public function get_menu(){
		if ($this->request->is('requested')){
			return $this->Category->find('list', array('fields' => array('Category.slug', 'Category.name')));
		}
	}

	public function get_trips(){
		if ($this->request->is('requested')){
			$params = $this->request->params;
			$cat_id = (int)$params['category_id'];
			$reg_id = (int)$params['region_id'];
			return $this->Trip->find('all', array('conditions' => array('Trip.region_id' => $reg_id, 'Trip.category_id' => $cat_id)));
		}
	}

	public function search(){
		$params = $this->request->query;
		$search = $params['search'];

		$cond = array('OR' => array("Trip.description LIKE '%$search%'","Trip.name LIKE '%$search%'", "Trip.short_description LIKE '%$search%'", "Trip.accommodation LIKE '%$search%'", "Trip.travel_method LIKE '%$search%'", "Trip.extra LIKE '%$search%'", "Trip.extra_title LIKE '%$search%'", "Trip.service LIKE '%$search%'"));
		$trips = $this->Trip->find('all', array('conditions' => $cond));

		$this->set('breadcrumb', array());

		$this->set('trips', $trips);
		$this->render('search');
	}

	public function quote_email(){

		$params = $this->params['data'];

		$user_email = $params['e-mail'];
		$user_name = $params['name'];
		$user_phone = $params['telephone'];
		$user_message = $params['message'];
		$user_referal = $params['referal'];

		$email = new CakeEmail('smtp');
		$email->from(array($user_email => $user_name));
		$email->template('default');
		$email->emailFormat('both');
		$email->viewVars(array('name' => $user_name, 'email' => $user_email, 'phone' => $user_phone, 'message' => $user_message, 'referal' => $user_referal));

		$email->send();

		$this->set('breadcrumb', array());

		$this->render('email_thankyou');
	}

}
