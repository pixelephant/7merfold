<?php $this->Html->script('list', array('inline' => false)); ?>
<?php $this->Html->css('list', null, array('inline' => false)); ?>

<section class="section offer-list">
  <?php foreach($countries as $country){ ?>
      <a href="<?php echo $this->webroot . $category['Category']['slug'] . '/' . $country['Country']['slug']; ?>" class="offer">
        <figure class="img">
          <?php 
            if($country['Country']['image_file'] != ''){
              echo $this->Html->image($country['Country']['image_file'], array('alt' => $country['Country']['name']));   
            }else{
              echo $this->Html->image('franciao.png', array('alt' => $country['Country']['name'])); 
            }
          ?>
        </figure>
        <div class="data">
          <h3><?php echo $country['Country']['name']; ?></h3>
          <p class="lead"><?php echo $this->App->trimText($country['Country']['useful_information']); ?></p>
          <span class="fake-a">Tovább &raquo;</span>
        </div>
      </a>
  <?php } ?>
  <?php echo $this->element('totop'); ?>
</section>