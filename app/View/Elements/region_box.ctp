<?php $trips = $this->requestAction('region/get_trips/' . $region_id . '/' . $category_id); ?>
<div class="region" id="<?php echo str_replace(' ', '-', $region_name); ?>">
    <h3 class="info"><?php echo $region_name; ?><?php echo $this->Html->link('<span class="icon" aria-hidden="true" data-icon="&#xe00d;"></span>', '/regio/'.$region_slug, array("escape"=>false)); ?></h3>
    <?php foreach($trips as $trip){
    	echo $this->element('trip_offer', array('trip' => $trip));
    } ?>
</div>