<?php $this->Html->css('list', null, array('inline' => false)); ?>

<section class="section offer-list">
	<?php foreach($trips as $trip){
		echo $this->element('trip_offer', array('trip' => $trip));
	} ?>
</section>