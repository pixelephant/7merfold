<?php foreach($trips as $trip){
	echo $this->element('trip_offer', array('trip' => $trip));
} ?>