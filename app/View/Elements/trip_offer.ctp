<a href="<?php echo $this->webroot; ?>utjaink/<?php echo $trip['Trip']['id']; ?>" class="offer">
  <div class="img">
    <?php echo $this->Html->image($trip['Trip']['circle_image_file']); ?>
  </div>                      
  <div class="data">
  	<?php if($trip['Trip']['star_rating'] > 0){ ?>
    	<span class="stars">
    		<?php for($i=0;$i<$trip['Trip']['star_rating'];$i++){ ?>
    			&star;
    		<?php } ?>
    	</span>
    <?php } ?>
    <h3><?php echo $trip['Trip']['name']; ?></h3>
    <p class="lead"><?php echo $trip['Trip']['short_description']; ?></p>
    <span class="fake-a">Tovább &raquo;</span>
  </div>
</a>