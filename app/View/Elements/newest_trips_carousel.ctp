<?php for($i=0; $i<count($trips); $i=$i+3){ ?>
<li class="slag">
  <?php for($j=0;$j<3;$j++){
          if(isset($trips[$i+$j])){ ?>
            <a class="offer" href="#">
              <img src="img/temp.png" alt="">
              <h3><?php echo $trips[$i+$j]['Trip']['name'] ?></h3>
            </a>
  <?php } 
          } ?>
</li>
<?php } ?>