<section class="section collapsible <?php echo $closed ? "closed" : ""; ?>" id="hotelek">
<h2 <?php echo $closed ? "" : 'class="open"'; ?>><a href="#">Hotelek<span><?php echo $closed ? "+" : "-"; ?></span></a></h2>
<div class="cont">
	<div class="program">
	<?php foreach($hotels as $hotel){ ?>
	  <div class="day">
	  	<div>
		    <h3><?php echo $hotel['name']; ?><?php echo $this->App->hotel_stars($hotel['star_rating']); ?></h3>
		    <p><?php echo $hotel['description']; ?></p>
		    <p class="accommodation"><?php echo $hotel['accommodation']; ?></p>
		    <p class="price"><?php echo $hotel['price']; ?></p>
		   </div>
		   <?php echo $this->Html->link(($this->Html->image('/img/thumbnails/' . $hotel['image_file'], array('alt' => $hotel['name'])) . '<span>' . $hotel['name'] . '</span>'), '/img/'.$hotel['image_file'], array('escape' => false, 'rel' => 'gallery', 'class' => 'fancybox', 'title' => $hotel['name'])); ?>
			<?php } ?>
	  </div>
	</div>
	<div class="half getquote">
        <a href="<?php echo $this->webroot; ?>ajanlat">Ajánlatkérés &raquo;</a>
        <p>Ne aggódj, ha valamin változtatnál nálunk megteheted!</p>
    </div>
</div>
</section>