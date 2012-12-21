<section class="section collapsible <?php echo $closed ? "closed" : ""; ?> route" id="utvonal">
  <h2 <?php echo $closed ? "" : 'class="open"'; ?>><a href="#">Útvonal<span><?php echo $closed ? "+" : "-"; ?></span></a></h2>
  <div class="cont">
    <!-- <img src=<?php echo $this->App->map_route($trip['Map']); ?> alt="Útvonal" /> -->
    <?php 
    	if(!empty($trip['Trip']['map_image_file'])){
    		echo $this->Html->image($trip['Trip']['map_image_file']); 
    	}
    ?>
  </div>
</section>