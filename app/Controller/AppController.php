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
		/* Kiszedi a nem kellő mezőket */
		// if($this->request->action == 'index' && $this->request->prefix == 'admin'){
		// 	$not_to_display = array('keywords', 'slug', 'image_file');

		// 	foreach($this->viewVars['scaffoldFields'] as $key => $field){
		// 		if(in_array($field, $not_to_display)){
		// 			unset($this->viewVars['scaffoldFields'][$key]);
		// 		}
		// 	}
		// }
		/* Kiszedi a nem kellő mezőket */

		// $file_fields = array();
		// $form_type = 'post';
		// if($this->request->action == 'add' || $this->request->action == 'edit'){
		// 	foreach($this->viewVars['scaffoldFields'] as $k => $v){
		// 		if(stripos($v, 'file')){
		// 			$form_type = 'file';
		// 			array_push($file_fields, $this->viewVars['scaffoldFields'][$k]);
		// 			unset($this->viewVars['scaffoldFields'][$k]);
		// 		}
		// 	}
		// }
		// $this->set('file_fields', $file_fields);
		// $this->set('form_type', $form_type);
	}

}
