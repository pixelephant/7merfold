<?php $this->Html->script('list', array('inline' => false)); ?>
<?php $this->Html->css('list', null, array('inline' => false)); ?>

<?php 
  if($regioned){
    echo $this->element('region_selector', array('country_name' => $trips[0]['Country']['name'], 'regions' => $regions));
  }
?>
<section class="section offer-list">
  <?php 
    if($regioned){
      foreach($regions as $region){
        echo $this->element('region_box', array('region_id' => $region['Region']['id'], 'region_name' => $region['Region']['name'], 'category_id' => $category_id));
      }
    }else{
      foreach($trips as $trip){
        echo $this->element('trip_offer', array('trip' => $trip));
      }
    }
  ?>
</section>

<?php echo $this->element('quote_box'); ?>

<?php if($regioned){ ?>
  <section class="section ajax">
      <h2><?php echo $this->Html->link(($trips[0]['Country']['name'] . ' <span>+</span>'), '/country_info/' . $trips[0]['Country']['id'], array('escape' => false)); ?></h2>
      <div class="cont hidden">
      
      </div>
  </section>
  <?php foreach($regions as $region){ ?>
    <section class="section ajax">
      <h2><?php echo $this->Html->link(($region['Region']['name'] . ' <span>+</span>'), '/region_info/' . $region['Region']['id'], array('escape' => false)); ?></h2>
      <div class="cont hidden">
      
      </div>
    </section>
  <?php } ?>
<?php } ?>

<?php echo $this->element('quote'); ?>