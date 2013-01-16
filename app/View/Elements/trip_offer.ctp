<a href="<?php echo $this->webroot; ?>utjaink/<?php echo $trip['Trip']['slug']; ?>" class="offer no-flick">
  <figure class="img">
    <?php 
    	if($trip['Trip']['circle_image_file'] == ''){
    		echo $this->Html->image('franciao.png');
    	}else{
    		echo $this->Html->image($trip['Trip']['circle_image_file']);
    	}
    ?>
  </figure>
  <div class="data">
    <?php $len = ((strlen($trip['Trip']['name']) > 19) ? 110 : 160); ?>
    <h3><?php echo $trip['Trip']['name']; ?> <?php echo $this->App->hotel_stars($trip['Trip']['star_rating']); ?></h3>
    <p class="lead"><?php echo $this->App->trimText($trip['Trip']['short_description'], $len); ?></p>
    <span class="fake-a">Tovább &raquo;</span>
  </div>
</a>