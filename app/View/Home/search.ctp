<?php $this->Html->css('list', null, array('inline' => false)); ?>

<section class="section offer-list">
	<p class="search-text">
		<?php
			if(count($trips) > 0){
				echo "Találatok a(z) <strong>\"".$_GET['search']."\"</strong> kifejezésre:";
			}
			else{
				echo "A(z) <strong>\"".$_GET['search']."\"</strong> kifejezésre sajnos nincs találat. Próbáld meg más kifejezéssel.";
			}
		?>	
	</p>
	<?php foreach($trips as $trip){
		echo $this->element('trip_offer', array('trip' => $trip));
	} ?>
</section>