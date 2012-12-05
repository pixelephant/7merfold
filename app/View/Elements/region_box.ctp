<?php $trips = $this->requestAction('region/get_trips/' . $region_id . '/' . $category_id); ?>
<div class="region" id="<?php echo $region_name; ?>">
    <h3><?php echo $region_name; ?></h3>
    <?php foreach($trips as $trip){
    	echo $this->element('trip_offer', array('trip' => $trip));
    } ?>
</div>