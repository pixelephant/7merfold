<?php
class Program extends AppModel {
    public $name = 'Program';

    public $belongs_to = array('Trip');

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
	    ),
	    'image_file' => array(
	    		'rule' => 'notEmpty',
	        'required'   => true,
	        'message'    => 'Kötelező megadni',
	        'on' => 'create'
	    )
		);
}
?>