<section id="program" class="section collapsible closed">
<h2><a href="#">Program <span>+</span></a></h2>
<div class="cont">
  <?php foreach($programs as $program){ ?>
    <div class="day">
      <div>
        <h3><?php echo $program['name']; ?></h3>
        <p><?php echo $program['description']; ?></p>
      </div>
       <?php echo $this->Html->link(($this->Html->image($program['image_file'], array('alt' => $program['name'], 'rel' => 'gallery', 'class' => 'fancybox', 'title' => $program['name'])) . '<span>' . $program['name'] . '</span>'), '#', array('escape' => false)); ?>
    </div>
  <?php } ?>
</div>
</section>