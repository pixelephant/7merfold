<a href="<?php echo $this->webroot; ?>utjaink/<?php echo $trip['Trip']['slug']; ?>" class="offer">
  <figure class="img">
    <?php 
    	if($trip['Trip']['circle_image_file'] == ''){
    		echo $this->Html->image('franciao.png');
    	}else{
    		echo $this->Html->image($trip['Trip']['circle_image_file']);
    	}
    ?>
    <?php echo $this->Html->image('mask.png'); ?>
  </figure>
  <div class="data">
    <h3><?php echo $trip['Trip']['name']; ?> <?php echo $this->App->hotel_stars($trip['Trip']['star_rating']); ?></h3>
    <p class="lead"><?php echo $this->App->trimText($trip['Trip']['short_description']); ?></p>
    <span class="fake-a">Tovább &raquo;</span>
  </div>
</a>