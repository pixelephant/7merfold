<?php for($i=0; $i<count($trips); $i++){ ?>
<li>
  <?php
          if(isset($trips[$i])){
          	echo $this->Html->link($this->Html->image('temp.png', array('alt' => $trips[$i]['Trip']['name'])) . '<p class="flex-caption">' . $this->App->trimText($trips[$i]['Trip']['name'], 30, false) . '</p>', '/utjaink/' . $trips[$i]['Trip']['slug'] , array('class' => 'offer', 'escape' => false));
          } ?>
</li>
<?php } ?>