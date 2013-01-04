<?php $closed = true; ?>
<?php if($trip_type == '1'){
	echo $this->element('trip_description', array('description' => $trip['Trip']['description'], 'closed' => false));
	echo $this->element('trip_sights', array('trip' => $trip, 'name' => 'Látnivalók', 'id' => 'latnivalok', 'closed' => $closed));
	echo $this->element('trip_hotels', array('hotels' => $trip['Hotel'], 'closed' => $closed));
	echo $this->element('trip_extra', array('id' => 'fontosinformaciok', 'title' => 'Fontos információk', 'content' => $trip['Trip']['important_information'], 'closed' => $closed, 'last' => 'true'));
} ?>

<?php if($trip_type == '2'){ 
	echo $this->element('trip_programs', array('programs' => $trip['Program'], 'closed' => false));
	echo $this->element('trip_prices_info', array('trip' => $trip, 'closed' => $closed));
	echo $this->element('trip_sights', array('trip' => $trip, 'name' => 'Látnivalók', 'id' => 'latnivalok', 'closed' => $closed, 'last' => 'true'));
} ?>

<?php if($trip_type == '3' || $trip_type == '4'){	
	echo $this->element('trip_description', array('description' => $trip['Trip']['description'], 'closed' => false));
	echo $this->element('trip_accommodation', array('trip' => $trip, 'closed' => $closed));
	echo $this->element('trip_sights', array('trip' => $trip, 'name' => 'Képek a hotelről', 'id' => 'hotel', 'closed' => $closed));
	echo $this->element('trip_prices_info_uveghegy', array('trip' => $trip, 'closed' => $closed, 'last' => 'true'));	
} ?>

<?php if($trip_type == '5'){
	echo $this->element('trip_programs', array('programs' => $trip['Program'], 'closed' => false));
	// echo $this->element('trip_prices_info', array('trip' => $trip, 'closed' => $closed));
	echo $this->element('trip_prices_info_uveghegy', array('trip' => $trip, 'closed' => $closed));
	echo $this->element('trip_map', array('trip' => $trip, 'closed' => $closed));
	echo $this->element('trip_sights', array('trip' => $trip, 'name' => 'Képgaléria', 'id' => 'kepek', 'closed' => $closed, 'last' => 'true'));
} ?>

<?php echo $this->element('trip_share', array('title' => $trip['Trip']['name'])); ?>

<?php 
	if(!empty($trip['Trip']['extra']) && !empty($trip['Trip']['extra_title'])){
		echo $this->element('trip_extra', array('id' => $trip['Trip']['extra_title'], 'title' => $trip['Trip']['extra_title'], 'content' => $trip['Trip']['extra'], 'closed' => $closed));
	}
?>