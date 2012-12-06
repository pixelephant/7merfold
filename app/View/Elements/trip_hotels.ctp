<section class="section collapsible closed" id="hotelek">
<h2><a href="#">Hotelek<span>+</span></a></h2>
<div class="cont">
	<?php foreach($hotels as $hotel){ ?>
	  <div class="hotel">
	    <h3><?php echo $hotel['name']; ?><?php echo $this->App->hotel_stars($hotel['star_rating']); ?></h3>
	    <p><?php echo $hotel['description']; ?></p>
	    <p class="accommodation"><?php echo $hotel['accommodation']; ?></p>
	    <p class="price"><?php echo $hotel['price']; ?></p>
	  </div>
	<?php } ?>
</div>
</section>