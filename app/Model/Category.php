<?php
class Category extends AppModel {
    public $name = 'Category';

    public $hasMany = 'Trip';

    public $validate = array(
	    'name' => array(
	    		'rule' => 'notEmpty',
	        'required'   => true,
	        'message'    => 'Kötelező megadni'
	    )
		);
}
?>