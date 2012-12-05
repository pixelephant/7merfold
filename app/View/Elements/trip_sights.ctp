<section class="section gallery" id="latnivalok">
<h2>Látnivalók</h2>
<div class="cont">
  <?php
    foreach($trip['Sight'] as $sight){
      echo $this->Html->link(($this->Html->image($sight['image_file'], array('alt' => $sight['name'], 'rel' => 'gallery', 'class' => 'fancybox', 'title' => $sight['name'])) . '<span>' . $sight['name'] . '</span>'), '#', array('escape' => false));
    } 
  ?>
  <a rel="gallery" href="img/asd.jpeg" class="fancybox" title="Sample title"><img src="img/asd.jpeg" /></a>
  <a rel="gallery" href="img/asd.jpeg" class="fancybox" title="Sample title"><img src="img/asd.jpeg" /></a>
  <a rel="gallery" href="img/asd.jpeg" class="fancybox" title="Sample title"><img src="img/asd.jpeg" /></a>
  <a rel="gallery" href="img/asd.jpeg" class="fancybox" title="Sample title"><img src="img/asd.jpeg" /></a>
</div>
</section>