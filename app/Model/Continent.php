<?php
class Continent extends AppModel {
    public $name = 'Continent';

    public $order = 'Continent.position ASC';

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