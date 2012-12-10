<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {

	public function hotel_stars($star_number){
		
		$star_number = (int)$star_number;
		$content = '';

		if($star_number > 0){
        	$content .= '<span class="stars">';
        		for($i=0;$i<$star_number;$i++){
        			$content .= '<span class="icon star" aria-hidden="true" data-icon="*"></span>';
        		}
        	$content .= '</span>';
        }

        return $content;
	}

    public function important_link($category_id){
        $category_id = (int)$category_id;

        if($category_id == 1){
            $name = 'Hotelek &darr;';
            $link = 'hotelek';
        }
        if($category_id == 2 || $category_id == 5){
            $name = 'Időpontok &amp; ár &darr;';
            $link = 'arak';
        }
        if($category_id == 4 || $category_id == 3){
            $name = 'Árak &amp; infók &darr;';
            $link = 'arak';
        }

        return '<a class="important" href="#'.$link.'">'.$name.'</a>';
    }

    public function map_route($points){

        empty($points);
        $points = array(array(40.737102,-73.990318),array(40.749825,-73.987963),array(40.752946,-73.987384),array(40.755823,-73.986397));
        //lecserélni
        $api_key = "&key=AIzaSyAAYzbqZTGF0buhn2MFujznTcMxr1rpP_Y";

        $url = "http://maps.googleapis.com/maps/api/staticmap?sensor=true&scale=2&size=640x640";

        $url .= $url+$api_key;

        $path = "&path=color:0x69297d%7Cweight:5|";
        $markers = "&markers=color:blue|";

        $len = count($points);
        $i = 0;
        foreach($points as $point){
            if($i != $len - 1){
                $path .= $point[0].",".$point[1]."|";
                $markers .= $point[0].",".$point[1]."|";
            }
            else{
                $path .= $point[0].",".$point[1];
                $markers .= $point[0].",".$point[1];
            }
            $i++;
        }

        $url .= $path;
        $url .= $markers;

        return $url;

    }

}
