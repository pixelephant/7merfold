<?php $this->Html->script('round', array('inline' => false)); ?>
<?php $this->Html->css('round', null, array('inline' => false)); ?>

<section class="section">
	<h2><?php echo $continent['Continent']['name']; ?></h2>
	<div class="cont formatted">
		<h3>Információk</h3>
		<?php echo $continent['Continent']['information']; ?>
	</div>
</section>

<?php if(!empty($continent['ContinentImage'])){ ?>
	<section class="section gallery">
	<h2><?php echo $continent['Continent']['name']; ?> képekben</h2>
	<div class="cont">
	  <?php
	    foreach($continent['ContinentImage'] as $sight){
	      echo $this->Html->link(($this->Html->image('/img/thumbnails/'.$sight['image_file'], array('alt' => $sight['title'])) . '<span>' . $sight['title'] . '</span>'), '/img/' . $sight['image_file'], array('escape' => false, 'rel' => 'gallery', 'class' => 'fancybox', 'title' => $sight['title']));
	    } 
	  ?>
	</div>
	<?php echo $this->element('totop'); ?>
	</section>
<?php } ?>
<section class="section">
	<?php echo $this->element('back_block'); ?>
</section>