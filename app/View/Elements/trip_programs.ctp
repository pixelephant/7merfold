<section id="program" class="section collapsible <?php echo $closed ? "closed" : ""; ?>">
<h2 <?php echo $closed ? "" : 'class="open"'; ?>><a href="#">Program <span><?php echo $closed ? "+" : "-"; ?></span></a></h2>
<div class="cont">
  <?php $i = 0; ?>
  <?php foreach($programs as $program){ ?>
    <div class="day">
      <div>
        <h3><?php echo $program['name']; ?></h3>
        <p><?php echo $program['description']; ?></p>
      </div>
       <?php 
        if(!($trip['Category']['id'] != 2 && $i == 0) && !($trip['Category']['id'] != 5 && $i == 0)){
         	$name = ($program['image_name'] == '' ? $program['name'] : $program['image_name']);
          if(!empty($program['image_file'])){
         	  echo $this->Html->link(($this->Html->image('/img/thumbnails/' . $program['image_file'], array('alt' => $name)) . '<span>' . $name . '</span>'), '/img/'.$program['image_file'], array('escape' => false, 'rel' => 'gallery', 'class' => 'fancybox', 'title' => $name)); 
          }
        }
        $i++;
          ?>
    </div>
  <?php } ?>
</div>
</section>