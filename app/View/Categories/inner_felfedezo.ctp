<?php $this->Html->script('list', array('inline' => false)); ?>
<?php $this->Html->css('list', null, array('inline' => false)); ?>

<section class="section offer-list">
  <?php foreach($continents as $continent){ ?>
      <a href="<?php echo $this->webroot . $category['Category']['slug'] . '/' . $continent['Continent']['slug']; ?>" class="offer">
        <div class="img">
          <?php 
            if($continent['Continent']['image_file'] != ''){
              echo $this->Html->image($continent['Continent']['image_file'], array('alt' => $continent['Continent']['name']));   
            }else{
              echo $this->Html->image('franciao.png', array('alt' => $continent['Continent']['name'])); 
            }
          ?>
          <?php #echo $this->Html->image('proba.png', array('class' => 'mask-img')); ?>
        </div>
        <div class="data">
          <h3><?php echo $continent['Continent']['name']; ?></h3>
          <p class="lead"><?php echo $this->App->trimText($continent['Continent']['information']); ?></p>
          <span class="fake-a">Tovább &raquo;</span>
        </div>
      </a>
  <?php } ?>
  <?php echo $this->element('totop'); ?>
</section>

<?php echo $this->element('quote'); ?>