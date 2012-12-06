<section id="program" class="section collapsible closed">
<h2><a href="#">Program <span>+</span></a></h2>
<div class="cont">
  <?php foreach($programs as $program){ ?>
    <div class="day">
      <div>
        <h3><?php echo $program['name']; ?></h3>
        <p><?php echo $program['description']; ?></p>
      </div>
       <?php echo $this->Html->link(($this->Html->image('/img/thumbnails/' . $program['image_file'], array('alt' => $program['name'])) . '<span>' . $program['name'] . '</span>'), '/img/'.$program['image_file'], array('escape' => false, 'rel' => 'gallery', 'class' => 'fancybox', 'title' => $program['name'])); ?>
    </div>
  <?php } ?>
</div>
</section>