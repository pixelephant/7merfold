<?php
class Continent extends AppModel {
    public $name = 'Continent';

    public $hasMany = array('Country', 'ContinentImage', 'Trip');

  //   public $validate = array(
	 //    'name' => array(
	 //    		'rule' => 'notEmpty',
	 //        'required'   => true,
	 //        'message'    => 'Kötelező megadni'
	 //    )
		// );
}
?>