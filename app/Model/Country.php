<?php
class Country extends AppModel {
    public $name = 'Country';

    public $hasMany = array('Trip', 'Region', 'CountryImage');

    public $order = 'Country.name ASC';

    public $validate = array(
	    'name' => array(
	    		'rule' => 'notEmpty',
	        'required'   => true,
	        'message'    => 'Kötelező megadni'
	    )
		);
}
?>