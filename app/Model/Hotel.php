<?php
class Hotel extends AppModel {
    public $name = 'Hotel';

    public $belongsTo = 'Trip';

  //   public $validate = array(
	 //    'name' => array(
	 //    		'rule' => 'notEmpty',
	 //        'required'   => true,
	 //        'message'    => 'Kötelező megadni'
	 //    ),
	 //    'star_rating' => array(
	 //    		'rule' => 'notEmpty',
	 //        'required'   => true,
	 //        'message'    => 'Kötelező megadni'
	 //    ),
	 //    'description' => array(
	 //    		'rule' => 'notEmpty',
	 //        'required'   => true,
	 //        'message'    => 'Kötelező megadni'
	 //    ),
	 //    'accommodation' => array(
	 //    		'rule' => 'notEmpty',
	 //        'required'   => true,
	 //        'message'    => 'Kötelező megadni'
	 //    ),
	 //    'price' => array(
	 //    		'rule' => 'notEmpty',
	 //        'required'   => true,
	 //        'message'    => 'Kötelező megadni'
	 //    )
		// );
}
?>