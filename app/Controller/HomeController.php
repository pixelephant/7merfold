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

		$this->set('newest_trips', $newest_trips);
		$this->set('news', $news);

		$this->render('index');
	}

	public function quote() {
		$this->set('quote_text', $this->Session->read('quote_text'));
		$this->render('quote');
	}

	public function static_page() {
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
		
	}

}
