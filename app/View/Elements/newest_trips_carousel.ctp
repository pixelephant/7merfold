<?php for($i=0; $i<count($trips); $i++){ ?>
<li>
	<figure class="img">
  <?php
    if(isset($trips[$i])){
    	if($trips[$i]['Trip']['circle_image_file'] != ''){
    		$image = $trips[$i]['Trip']['circle_image_file'];
    	}else{
    		$image = 'temp.png';
    	}
    	echo $this->Html->link($this->Html->image($image, array('alt' => $trips[$i]['Trip']['name'])) . '<p class="flex-caption">' . $this->App->trimText($trips[$i]['Trip']['name'], 30, false) . '</p>', '/utjaink/' . $trips[$i]['Trip']['slug'] , array('class' => 'offer', 'escape' => false));
  	} 
  ?>
  </figure>
</li>
<?php } ?>