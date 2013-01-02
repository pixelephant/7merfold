<?php
class Region extends AppModel {
    public $name = 'Region';

    public $belongsTo = 'Country';
    public $hasMany = 'RegionImage';

    public $order = 'Region.name ASC';

    public $validate = array(
	    'name' => array(
	    		'rule' => 'notEmpty',
	        'required'   => true,
	        'message'    => 'Kötelező megadni'
	    ),
	    'description' => array(
	    		'rule' => 'notEmpty',
	        'required'   => true,
	        'message'    => 'Kötelező megadni'
	    )
		);
}
?>