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
App::uses('Sanitize', 'Utility');

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
	public $uses = array('Trip', 'Category', 'Region', 'News', 'Country', 'Continent', 'Content', 'MailchimpSubscriber');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function index() {

		$newest_trips = $this->Trip->find('all', array('order' => 'updated desc', 'conditions' => array('newest' => 1)));
		$news = $this->News->find('all', array('order' => 'created desc', 'limit' => 3));
		$categories_top = $this->Category->find('all', array('limit' => 3));
		$categories_bottom = $this->Category->find('all', array('offset' => 3, 'limit' => 2));

		$irodankrol = $this->Content->find('first', array('conditions' => array('slug' => 'irodankrol')));

		$this->set('newest_trips', $newest_trips);
		$this->set('news', $news);
		$this->set('categories_top', $categories_top);
		$this->set('categories_bottom', $categories_bottom);
		$this->set('irodankrol', $irodankrol);

		$this->set('breadcrumb', array());
		$this->set('page_title', 'Főoldal');
		$this->set('page_keywords', 'utazás, utazási iroda');

		$this->render('index');
	}

	public function quote() {
		$this->set('breadcrumb', array());
		$this->set('page_title', $this->Session->read('quote_text'));
		$this->set('page_keywords', 'utazás, utazási iroda');

		$this->set('quote_text', $this->Session->read('quote_text'));
		$this->render('quote');
	}

	public function static_page() {
		$this->set('breadcrumb', array());
		$this->set('page_title', 'Statikus oldal');
		$this->set('page_keywords', 'utazás, utazási iroda');

		$this->render('static_page');
	}

	public function get_menu(){
		if ($this->request->is('requested')){
			return $this->Category->find('list', array('fields' => array('Category.slug', 'Category.name'), 'order' => 'position asc'));
		}
	}

	public function get_sub_menu(){
		if ($this->request->is('requested')){
			$params = $this->request->params;
			$cat_slug = $params['category_slug'];
			$cat = $this->Category->find('first', array('conditions' => array('Category.slug' => $cat_slug)));
			$content = '';

			//$cat_slug == 'korutazasok' || 
			if($cat_slug == 'nyaralasok-uveghegyen-innen' || $cat_slug == 'nyaralasok-uveghegyen-tul'){
				$countries = $this->Trip->find('list', array('fields' => array('Trip.id', 'Trip.country_id'), 'conditions' => array('Trip.category_id' => $cat['Category']['id']), 'group' => 'Trip.country_id'));
				$ids = array();

				foreach ($countries as $key => $value) {
					$ids[] = $value;
				}

				$countries = $this->Country->find('list', array('order' => 'Country.name', 'fields' => array('Country.slug', 'Country.name'), 'conditions' => array('Country.id' => $ids)));
				foreach ($countries as $country_slug => $name) {
					$content .= '<li><a href="' . $this->webroot . $cat_slug . '/' . $country_slug . '">' . $name . '</a></li>';
				}
			}elseif($cat_slug == 'felfedezoutak'){
				$continents = $this->Trip->find('list', array('fields' => array('Trip.id', 'Trip.continent_id'), 'conditions' => array('Trip.category_id' => $cat['Category']['id']), 'group' => 'Trip.continent_id'));

				$ids = array();

				foreach ($continents as $key => $value) {
					$ids[] = $value;
				}

				$continents = $this->Continent->find('list', array('order' => 'Continent.name', 'fields' => array('Continent.slug', 'Continent.name'), 'conditions' => array('Continent.id' => $ids)));
				foreach ($continents as $country_slug => $name) {
					$content .= '<li><a href="' . $this->webroot . $cat_slug . '/' . $country_slug . '">' . $name . '</a></li>';
				}
			}else{
				$trips = $this->Trip->find('list', array('order' => 'Trip.name', 'fields' => array('Trip.slug', 'Trip.name'), 'conditions' => array('Trip.category_id' => $cat['Category']['id'])));
				foreach ($trips as $slug => $name){
					$content .= '<li><a href="' . $this->webroot . 'utjaink/' . $slug . '">' . $name . '</a></li>';
				}
			}
			return $content;
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
		$search = Sanitize::escape($params['search'], 'default');
		// $search = $params['search'];

		$cond = array('OR' => array("LOWER(Trip.description) LIKE LOWER('%$search%') collate utf8_bin","LOWER(Trip.name) LIKE LOWER('%$search%') collate utf8_bin", "LOWER(Trip.short_description) LIKE LOWER('%$search%') collate utf8_bin", "LOWER(Trip.accommodation) LIKE LOWER('%$search%') collate utf8_bin", "LOWER(Trip.travel_method) LIKE LOWER('%$search%') collate utf8_bin", "LOWER(Trip.extra) LIKE LOWER('%$search%') collate utf8_bin", "LOWER(Trip.extra_title) LIKE LOWER('%$search%') collate utf8_bin", "LOWER(Trip.service) LIKE LOWER('%$search%') collate utf8_bin", "LOWER(Trip.important_information) LIKE LOWER('%$search%') collate utf8_bin", "LOWER(Country.name) LIKE LOWER('%$search%') collate utf8_bin", "LOWER(Continent.name) LIKE LOWER('%$search%') collate utf8_bin", "LOWER(Region.name) LIKE LOWER('%$search%') collate utf8_bin"));
		$trips = $this->Trip->find('all', array('conditions' => $cond));

		$this->set('breadcrumb', array());
		$this->set('page_title', 'Keresés: ' . $search);
		$this->set('page_keywords', 'utazás, utazási iroda,' . $search);

		$this->set('trips', $trips);
		$this->render('search');
	}

	public function quote_email(){

		$params = $this->params['data'];

		if(!isset($params['e-mail']) || !isset($params['name']) || !isset($params['telephone']) || !isset($params['message']) || !isset($params['referal'])){
			$this->redirect('/ajanlat');
		}

		$user_email = $params['e-mail'];
		$user_name = $params['name'];
		$user_phone = $params['telephone'];
		$user_message = $params['message'];
		$user_referal = $params['referal'];
		$error = false;

		$this->Session->setFlash($user_email, '', array(), 'user_email');
		$this->Session->setFlash($user_name, 'default', array(), 'user_name');
		$this->Session->setFlash($user_phone, 'default', array(), 'user_telephone');
		$this->Session->setFlash($user_message, 'default', array(), 'user_message');

		if(empty($user_name)){
			$this->Session->setFlash('Kérjük adja meg a nevét', 'default', array(), 'name_error');
			$error = true;
		}

		if(empty($user_phone)){
			$this->Session->setFlash('Kérjük adja meg a telefonszámát!', 'default', array(), 'telephone_error');
			$error = true;
		}

		if(empty($user_email)){
			$this->Session->setFlash('Kötelező megadni.', 'default', array(), 'email_error');	
			$error = true;
		}elseif(!$this->checkEmail($user_email)){
			$this->Session->setFlash('Érvényes e-mail címnek kell lennie.', 'default', array(), 'email_error');	
			$error = true;
		}

		if($error){
			$this->redirect('/ajanlat');
		}

		if(isset($params['newsl'])){
			$newsletter = $params['newsl'];
		}else{
			$newsletter = 'off';
		}

		$email = new CakeEmail('smtp');
		$email->from(array($user_email => $user_name));
		$email->template('default');
		$email->emailFormat('both');
		$email->viewVars(array('name' => $user_name, 'email' => $user_email, 'phone' => $user_phone, 'message' => $user_message, 'referal' => $user_referal));

		$email->send();

		if($newsletter == 'on'){
			$data = array();
			$data['emailaddress'] = $user_email;
			$data['LNAME'] = $user_name;
			// $this->MailchimpSubscriber->create($data);
			$this->MailchimpSubscriber->save($data);
		}

		$this->set('breadcrumb', array());
		$this->set('page_title', 'Köszönjük a leveledet!');
		$this->set('page_keywords', 'utazás, utazási iroda, köszönjük');

		$this->render('email_thankyou');
	}

	public function country_regions(){

		$country_id = (int)($this->request->params['country_id']);

		$c = $this->Region->find('list', array('fields' => array('id', 'name'), 'conditions' => array('Region.country_id' => $country_id), 'order' => 'Region.name'));

		$this->set('content', json_encode($c));
		$this->render('ajax', 'ajax');
	}

	public function continent_countries(){

		$continent_id = (int)($this->request->params['continent_id']);

		$c = $this->Country->find('list', array('fields' => array('id', 'name'), 'conditions' => array('Country.continent_id' => $continent_id), 'order' => 'Country.name'));

		$this->set('content', json_encode($c));
		$this->render('ajax', 'ajax');
	}

	private function checkEmail($email) {
	  if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$email)){
	    list($username,$domain)=split('@',$email);
	    if(!checkdnsrr($domain,'MX')) {
	      return false;
	    }
	    return true;
	  }
	  return false;
	}

}
