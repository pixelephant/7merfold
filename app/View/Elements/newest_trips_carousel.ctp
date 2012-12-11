<?php for($i=0; $i<count($trips); $i=$i+3){ ?>
<li class="slag">
  <?php for($j=0;$j<3;$j++){
          if(isset($trips[$i+$j])){
          	echo $this->Html->link($this->Html->image('temp.png', array('alt' => $trips[$i+$j]['Trip']['name'])) . '<h3>' . $trips[$i+$j]['Trip']['name'] . '</h3>', '/utjaink/' . $trips[$i+$j]['Trip']['slug'] , array('class' => 'offer', 'escape' => false));
          
  			} 
          } ?>
</li>
<?php } ?>