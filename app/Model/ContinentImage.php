<?php
class ContinentImage extends AppModel {
    public $name = 'ContinentImage';

    public $belongsTo = array('Continent');


  //   public $validate = array(
	 //    'name' => array(
	 //    		'rule' => 'notEmpty',
	 //        'required'   => true,
	 //        'message'    => 'Kötelező megadni'
	 //    )
		// );
}
?>