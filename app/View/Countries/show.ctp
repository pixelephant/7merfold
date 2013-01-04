<?php $this->Html->script('round', array('inline' => false)); ?>
<?php $this->Html->css('round', null, array('inline' => false)); ?>

<section class="section">
	<h2><?php echo $country['Country']['name']; ?></h2>
	<div class="cont formatted">
		<h3>Általános információk</h3>
		<?php echo $country['Country']['information']; ?>
	</div>
	<div class="cont formatted">
		<h3>Hasznos információk</h3>
		<?php echo $country['Country']['useful_information']; ?>
	</div>
	<div class="cont formatted">
		<h3>Érdekességek</h3>
		<?php echo $country['Country']['interesting_information']; ?>
	</div>
</section>

<?php if(!empty($country['CountryImage'])){ ?>
	<section class="section gallery">
	<h2><?php echo $country['Country']['name']; ?> képekben</h2>
	<div class="cont">
	  <?php
	    foreach($country['CountryImage'] as $sight){
	      echo $this->Html->link(($this->Html->image('/img/thumbnails/'.$sight['image_file'], array('alt' => $sight['title'])) . '<span>' . $sight['title'] . '</span>'), '/img/' . $sight['image_file'], array('escape' => false, 'rel' => 'gallery', 'class' => 'fancybox', 'title' => $sight['title']));
	    } 
	  ?>
	</div>
	<?php echo $this->element('totop'); ?>
	</section>
<?php } ?>