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

<?php if($regioned){ ?>
  <section class="section ajax">
      <h2><a href="ajax.html"><?php echo $trips[0]['Country']['name']; ?> <span>+</span></a></h2>
      <div class="cont hidden">
      
      </div>
  </section>
  <?php foreach($regions as $region){ ?>
    <section class="section ajax">
      <h2><a href="ajax.html"><?php echo $region['Region']['name']; ?> <span>+</span></a></h2>
      <div class="cont hidden">
      
      </div>
    </section>
  <?php } ?>
<?php } ?>

<?php echo $this->element('quote'); ?>