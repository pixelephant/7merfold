<?php $this->Html->script('list', array('inline' => false)); ?>
<?php $this->Html->css('list', null, array('inline' => false)); ?>

<section class="section offer-list">
  <?php foreach($countries as $country){ ?>
      <a href="<?php echo $this->webroot . $category['Category']['slug'] . '/' . $country['Country']['id']; ?>" class="offer">
        <div class="img">
          <?php #echo $this->Html->image($country['Country']['image_file']); ?>
        </div>                      
        <div class="data">
          <h3><?php echo $country['Country']['name']; ?></h3>
          <span class="fake-a">Tovább &raquo;</span>
        </div>
      </a>
  <?php } ?>
</section>

<?php echo $this->element('quote'); ?>