<section class="section gallery" id="<?php echo $id; ?>">
<h2><?php echo $name; ?></h2>
<div class="cont">
  <?php
    foreach($trip['Sight'] as $sight){
      echo $this->Html->link(($this->Html->image('/img/thumbnails/'.$sight['image_file'], array('alt' => $sight['name'])) . '<span>' . $sight['name'] . '</span>'), '/img/' . $sight['image_file'], array('escape' => false, 'rel' => 'gallery', 'class' => 'fancybox', 'title' => $sight['name']));
    } 
  ?>
</div>
<?php 
	if(isset($last)){
		echo $this->element('totop');
	}
?>
</section>