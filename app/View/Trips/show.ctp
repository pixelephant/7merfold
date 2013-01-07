<?php $this->Html->script('round', array('inline' => false)); ?>
<?php $this->Html->css('round', null, array('inline' => false)); ?>

<?php $this->assign('sidebar', $this->element('sidebar')); ?>

<section class="sum section">
<h2><?php echo $trip['Trip']['name']; ?><?php echo (empty($trip['Trip']['star_rating']) ? '' : $this->App->hotel_stars($trip['Trip']['star_rating'])); ?></h2>
<?php echo $this->Html->image($trip['Trip']['image_file'], array('alt' => $trip['Trip']['name'])); ?>
<div class="clearfix">

<p class="lead"><?php echo $trip['Trip']['short_description']; ?></p>
  <nav id="inline-nav">
    <?php echo $this->element('nav', array('trip_type' => $trip_type)) ?>
    <a href="#vizum">Vízum</a>
    <a href="#<?php echo $trip['Country']['name']; ?>"><?php echo $trip['Country']['name']; ?></a>
  </nav>
<div>
  <?php echo $this->App->important_link($trip['Trip']['category_id']); ?>
  <a class="quote" href="<?php echo $this->webroot; ?>ajanlat">Ajánlatkérés &raquo;</a>
</div>
</div>
</section>

<?php echo $this->element('content', array('trip' => $trip, 'trip_type' => $trip_type)); ?>




<!-- <section class="section">
<h2>Információk</h2>
<div class="cont">
  <div class="block">
    <h3>Időpontok</h3>
    <p><?php echo $trip['Trip']['travel_date']; ?></p>
  </div>
  <div class="block">
    <h3>Elhelyezés</h3>
    <p><?php echo $trip['Trip']['description']; ?></p>
  </div>
</div>
</section>
                              
<section id="program" class="section collapsible closed">
<h2><a href="#">Program <span>+</span></a></h2>
<div class="cont">
  <div class="day">
    <div>
      <h3>1. nap</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
    </div>
    <a href="#">
      <img src="img/3.jpeg" alt="">
    </a>
  </div>  
  <div class="day">
    <div>
      <h3>2. nap</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
    </div>
    <a href="#">
      <img src="img/4.jpeg" alt="">
    </a>
  </div>  
  <div class="day">
    <div>
      <h3>3. nap</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
    </div>
    <a href="#">
      <img src="img/3.jpeg" alt="">
    </a>
  </div>  
  <div class="day">
    <div>
      <h3>4. nap</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
    </div>
    <a href="#">
      <img src="img/4.jpeg" alt="">
    </a>
  </div>    
</div>
</section>



<section class="section share">
<h2>Megosztás</h2> <div><a href="mailto:pixelephant@pixelephant.hu?body=szuper&subject=7merfold"><span class="icon" aria-hidden="true" data-icon="e"></span></a><a target="_blank" href="http://www.facebook.com/share.php?u=www.pixelephant.hu"><span class="icon" aria-hidden="true" data-icon="f"></span></a></div>
</section>

<section id="prices" class="section collapsible closed">
<h2><a href="#">Árak <span>+</span></a></h2>
<div class="cont">
  <div class="half">
    <div class="block">
      <h3>Részvételi díj</h3>
      <p>Olcsó nyugi</p>
    </div>
    <div class="block">
      <h3>Belépők ára</h3>
      <p>~ 10 EUR/kopf</p>
    </div>
    <div class="block">
      <p class="extra">
        A részvételi díj tartalmazza az utazást és programot a fenitek szerint magyar idegenvezetéssel, 7 éjszaka szállást kétágyas szobában, félpanziót, és a betegség-, baleset-, poggyász- és útlemondási biztosítást.
      </p>
    </div>
  </div>
  <div class="half getquote">
    <a href="<?php echo $this->webroot; ?>ajanlat">Ajánlatkérés &raquo;</a>
    <p>Ne aggódj, ha valamin változtatnál nálunk megteheted!</p>
  </div>
</div>
</section> -->

<?php echo $this->element('quote_box'); ?>

<?php if($trip['Category']['id'] == 1){ ?>
  <section id="<?php echo $trip['Country']['name']; ?>" class="section collapsible">
    <h2><?php echo $this->Html->link(($trip['Country']['name'] . ' <span>+</span>'), '#', array('escape' => false)); ?></h2>
    <!-- <div class="cont hidden">
      <?php echo $trip['Country']['information']; ?>
    </div> -->
  </section>
<?php }else{ ?>
  <section id="vizum" class="section collapsible halfer">
    <h2><?php echo $this->Html->link('Vízum <span>+</span>', '#', array('escape' => false)); ?></h2>
    <div class="cont hidden">
      <?php echo $trip['Country']['visa_info']; ?>    
    </div>
  </section>
  <section id="<?php echo $trip['Country']['name']; ?>" class="section collapsible halfer">
    <h2><?php echo $this->Html->link(($trip['Country']['name'] . ' <span>+</span>'), '#', array('escape' => false)); ?></h2>
    <div class="cont hidden">
      <?php echo $trip['Country']['information']; ?>
    </div>
  </section>                                
<?php } ?>

<?php if($trip['Trip']['hajozz'] == 1){ ?>
  <!-- <div class="cta boat">
    <h3>Gyere hajózni!</h3>
    <span class="icon" aria-hidden="true" data-icon="&#xe005;"></span>
    <h2><a href="http://www.hajozz.eu" target="_blank">hajozz.eu</a></h2>
  </div> -->
<?php } ?>
                                                                                                                                                                                                
<?php echo $this->element('quote'); ?>