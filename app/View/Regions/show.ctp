<?php $this->Html->script('round', array('inline' => false)); ?>
<?php $this->Html->css('round', null, array('inline' => false)); ?>

<section class="section">
	<h2><?php echo $region['Region']['name']; ?></h2>
	<div class="cont formatted">
		<h3>Hasznos információk</h3>
		<?php echo $region['Region']['description']; ?>
	</div>
	<?php echo (empty($region['RegionImage']) ? $this->element('totop') : ''); ?>
</section>

<?php if(!empty($region['RegionImage'])){ ?>
	<section class="section gallery">
	<h2><?php echo $region['Region']['name']; ?> képekben</h2>
	<div class="cont">
	  <?php
	    foreach($region['RegionImage'] as $sight){
	      echo $this->Html->link(($this->Html->image('/img/thumbnails/'.$sight['image_file'], array('alt' => $sight['title'])) . '<span>' . $sight['title'] . '</span>'), '/img/' . $sight['image_file'], array('escape' => false, 'rel' => 'gallery', 'class' => 'fancybox', 'title' => $sight['title']));
	    } 
	  ?>
	</div>
	<?php echo $this->element('totop'); ?>
	</section>
<?php } ?>