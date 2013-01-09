<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public function beforeFilter() {
	  if ($this->request->prefix == 'admin') {
	    $this->layout = 'default_orig';
	  } 
	}

	function beforeRender(){
		$this->set('referer',$this->referer());

		if(!isset($this->viewVars['breadcrumb'])){
			$this->set('breadcrumb', array());
		}

		if(!isset($this->viewVars['page_title'])){
			$this->set('page_title', 'Ilyen oldalunk sajnos még nincs');
		}

		if(!isset($this->viewVars['page_keywords'])){
			$this->set('page_keywords', 'Ilyen oldalunk sajnos még nincs');
		}
	}

	public function beforeError(){
		$this->set('breadcrumb', array());
   	$this->set('page_title', 'Ilyen oldalunk sajnos még nincs');
   	$this->set('page_keywords', '404');
	}

}
