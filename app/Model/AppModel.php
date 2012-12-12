<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

	public function beforeSave($options = array()) {
    foreach($this->data as $model => $v){
    	foreach($this->data[$model] as $field => $value){
    		if($field == 'title' || $field == 'name'){
    			$text = $value;
    		}
    	}
    	if(isset($this->data[$model]['slug'])){
  			$this->data[$model]['slug'] = $this->create_slug($text, $model);
  		}
    }
   	return true;
	}

	public function create_slug($string, $model){
		$unique = false;
		$i = 0;
		while(!$unique){
			$slug = $this->slugify($string);
			$orig = $string;
			/* Kérdéses model használata */
			$m = ClassRegistry::init($model);
			$count = $m->find('count', array('conditions' => array(($model . '.slug') => $slug)));
			if($count == 0){
				$unique = true;
			}else{
				$i++;
				$string = $orig . ("-" . $count);
			}
		}
		return $slug;
	}

	static public function slugify($text)
	{ 
	  // replace non letter or digits by -
	  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

	  // trim
	  $text = trim($text, '-');

	  // transliterate
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	  // lowercase
	  $text = strtolower($text);

	  // remove unwanted characters
	  $text = preg_replace('~[^-\w]+~', '', $text);

	  if (empty($text))
	  {
	    return 'n-a';
	  }
	  return $text;
	}

}
