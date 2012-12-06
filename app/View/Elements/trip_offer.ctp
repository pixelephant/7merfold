<a href="<?php echo $this->webroot; ?>utjaink/<?php echo $trip['Trip']['id']; ?>" class="offer">
  <div class="img">
    <?php echo $this->Html->image($trip['Trip']['circle_image_file']); ?>
  </div>                      
  <div class="data">
  	<?php echo $this->App->hotel_stars($trip['Trip']['star_rating']); ?>
    <h3><?php echo $trip['Trip']['name']; ?></h3>
    <p class="lead"><?php echo $trip['Trip']['short_description']; ?></p>
    <span class="fake-a">Tovább &raquo;</span>
  </div>
</a>