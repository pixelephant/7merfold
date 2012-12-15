<?php if($trip_type == '1'){
	echo $this->element('trip_description', array('description' => $trip['Trip']['description']));
	echo $this->element('trip_sights', array('trip' => $trip, 'name' => 'Látnivalók', 'id' => 'latnivalok'));
	echo $this->element('trip_hotels', array('hotels' => $trip['Hotel']));
} ?>

<?php if($trip_type == '2'){ 
	echo $this->element('trip_programs', array('programs' => $trip['Program']));
	echo $this->element('trip_prices_info', array('trip' => $trip));
} ?>

<?php if($trip_type == '3' || $trip_type == '4'){	
	echo $this->element('trip_description', array('description' => $trip['Trip']['description']));
	echo $this->element('trip_sights', array('trip' => $trip, 'name' => 'Képek a hotelről', 'id' => 'hotel'));
	echo $this->element('trip_prices_info_uveghegy', array('trip' => $trip));
} ?>

<?php if($trip_type == '5'){
	
	echo $this->element('trip_programs', array('programs' => $trip['Program']));
	echo $this->element('trip_prices_info', array('trip' => $trip));
	echo $this->element('trip_map',$trip);
} ?>

<?php echo $this->element('trip_share', array('title' => $trip['Trip']['name'])); ?>

<?php 
	if(!empty($trip['Trip']['extra']) && !empty($trip['Trip']['extra_title'])){
		echo $this->element('trip_extra', array('id' => $trip['Trip']['extra_title'], 'title' => $trip['Trip']['extra_title'], 'content' => $trip['Trip']['extra']));
	}
?>