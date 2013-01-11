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

	public function beforeValidate($options = array()) {
		/* SLUG */
    foreach($this->data as $model => $v){
    	$text = '';
    	foreach($this->data[$model] as $field => $value){
    		if(($field == 'title' || $field == 'name') && !empty($this->data[$model][$field]) && $text == ''){
    			$text = $value;
    		}
    	}
    	if(isset($this->data[$model]['slug']) && $this->data[$model]['slug'] == ''){
  			$this->data[$model]['slug'] = $this->create_slug($text, $model);
  		}
    }
    /* SLUG */
    /* FILE */
    foreach($this->data as $model => $v){
    	foreach($this->data[$model] as $field => $value){
    		if(stripos($field, 'file')){
    			if(!empty($this->data[$model][$field]['name'])){
    				$name = $this->data[$model][$field]['name'];
    				$i = 1;
    				$ext = pathinfo($name, PATHINFO_EXTENSION);
	    			$bname = pathinfo($name, PATHINFO_FILENAME);
	    			while(file_exists($this->webroot.'img/'.$name)){
	    				// $name = '1' . $name;
	    				$name = $bname . "_" . $i . "." . $ext;
	    				$i++;
	    			}
	    			move_uploaded_file($this->data[$model][$field]['tmp_name'], $this->webroot.'img/'.$name);
	    			if($field == 'circle_image_file' || $model == 'Country' || $model == 'Continent'){
	    				$png = imagecreatefrompng($this->webroot.'img/mask.png');
	    				if($ext == 'JPG' || $ext == 'JPEG' || $ext == 'jpg' || $ext == 'jpeg'){
	    					$jpeg = imagecreatefromjpeg($this->webroot.'img/'.$name);	
	    				}elseif($ext == 'png' || $ext == 'PNG'){
	    					$jpeg = imagecreatefrompng($this->webroot.'img/'.$name);	
	    				}
							list($width, $height) = getimagesize($this->webroot.'img/'.$name);
							list($newwidth, $newheight) = getimagesize($this->webroot.'img/mask.png');
							$out = imagecreatetruecolor($newwidth, $newheight);
							imagecopyresampled($out, $jpeg, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
							imagecopyresampled($out, $png, 0, 0, 0, 0, $newwidth, $newheight, $newwidth, $newheight);
							
							if($ext == 'JPG' || $ext == 'JPEG' || $ext == 'jpg' || $ext == 'jpeg'){
	    					imagejpeg($out, $this->webroot.'img/'.$name, 100);
	    				}elseif($ext == 'png' || $ext == 'PNG'){
	    					imagepng($out, $this->webroot.'img/'.$name, 0);
	    				}
	    			}else{
		    			if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'JPEG'){
		    				$this->make_thumb(($this->webroot.'img/'.$name), ($this->webroot.'img/thumbnails/'.$name), $desired_width = 250, $max_height = 150);
		    			}elseif($ext == 'PNG' || $ext == 'png'){
		    				$this->make_thumb_png(($this->webroot.'img/'.$name), ($this->webroot.'img/thumbnails/'.$name), 250, 150);
		    			}else{
		    				copy($this->webroot.'img/'.$name, $this->webroot.'img/thumbnails/'.$name);
		    			}
		    		}
	    			$this->data[$model][$field] = $name;
    			}else{
    				unset($this->data[$model][$field]);
    			}
    		}
    	}
    }
    /* FILE */
   	return true;
	}

	public function create_slug($string, $model){
		$unique = false;
		$i = 0;
		$orig = $string;
		while(!$unique){
			$slug = $this->slugify($string);
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

	static public function slugify($text){ 

		// lowercase
	  $text = strtolower($text);

	  // replace accent characters
		$accent = array("á","é","í","ó","ö","ő","ü","ű","ú");
		$non_accent = array("a","e","i","o","o","o","u","u","u");
		$text = str_replace($accent, $non_accent, $text);

	  // replace non letter or digits by -
	  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

	  // trim
	  $text = trim($text, '-');

	  // transliterate
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);	  

	  // remove unwanted characters
	  $text = preg_replace('~[^-\w]+~', '', $text);

	  if (empty($text))
	  {
	    return 'n-a';
	  }
	  return $text;
	}

	function make_thumb($src, $dest, $desired_width, $max_height) {
	  /* read the source image */
	  $source_image = imagecreatefromjpeg($src);
	  $width = imagesx($source_image);
	  $height = imagesy($source_image);
	  
	  /* find the "desired height" of this thumbnail, relative to the desired width  */
	  // $desired_height = floor($height * ($desired_width / $width));
	  
	  // if($desired_height > $max_height){
	  // 	$desired_width = $desired_width * ($max_height / $desired_height);
	  // 	$desired_height = $max_height;
	  // }

	  /* create a new, "virtual" image */
	  // $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
	  if(($width / $height) > ($desired_width / $max_height)){
	  	$h = $height;
	  	$w = ($desired_width / $max_height) * $h;
	  }else{
	  	$w = $width;
	  	$h = ($max_height / $desired_width) * $w;
	  }

	  $virtual_image = imagecreatetruecolor($desired_width, $max_height);

	  /* copy source image at a resized size */
	  $a = imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $max_height, $w, $h);

	  /* create the physical thumbnail image to its destination */
	  imagejpeg($virtual_image, $dest);
	}

	function make_thumb_png($src, $dest, $width, $height){
		list($width_orig, $height_orig) = getimagesize( $src );
		$image_p = imagecreatetruecolor($width, $height);
		imagealphablending( $image_p, false );
    imagesavealpha( $image_p, true );
    $image = imagecreatefrompng( $src );

    if(($width_orig / $height_orig) > ($width / $height)){
	  	$h = $height_orig;
	  	$w = ($width / $height) * $h;
	  }else{
	  	$w = $width_orig;
	  	$h = ($height / $width) * $w;
	  }

    imagecopyresampled( $image_p, $image, 0, 0, 0, 0, $width, $height, $w, $h);
    imagepng($image_p, $dest);
	}

}
