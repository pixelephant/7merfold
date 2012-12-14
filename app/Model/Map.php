<?php
class Map extends AppModel {
    public $name = 'Map';

    public $belongsTo = 'Trip';

    public $validate = array(
	    'lat' => array(
	    		'rule' => 'notEmpty',
	        'required'   => true,
	        'message'    => 'Kötelező megadni'
	    ),
	    'lng' => array(
	    		'rule' => 'notEmpty',
	        'required'   => true,
	        'message'    => 'Kötelező megadni'
	    ),
	    'trip_id' => array(
	    		'rule' => 'notEmpty',
	        'required'   => true,
	        'message'    => 'Kötelező megadni'
	    )
		);
}
?>