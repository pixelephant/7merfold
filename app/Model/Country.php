<?php
class Country extends AppModel {
    public $name = 'Country';

    public $hasMany = array('Trip', 'Region', 'CountryImage');

    public $validate = array(
	    'name' => array(
	    		'rule' => 'notEmpty',
	        'required'   => true,
	        'message'    => 'Kötelező megadni'
	    )
		);
}
?>