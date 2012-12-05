<?php $this->Html->script('round', array('inline' => false)); ?>
<?php $this->Html->css('round', null, array('inline' => false)); ?>
<section class="sum section">
<h2><span class="shares"><span>Megosztás</span><a href="mailto:pixelephant@pixelephant.hu?body=szuper&subject=7merfold"><span class="icon" aria-hidden="true" data-icon="e"></span></a><a target="_blank" href="http://www.facebook.com/share.php?u=www.pixelephant.hu"><span class="icon" aria-hidden="true" data-icon="f"></span></a></span><?php echo $trip['Trip']['name']; ?></h2>
<img src="img/lisabon.jpeg" alt="">
<div class="clearfix">
  <nav id="inline-nav">
  <a href="#program">Program</a>
  <a href="#">Ár</a>
  <a href="#">Vízum</a>
  <a href="#">Blala</a>
  <a href="#">Salala</a>
  <a href="#">Tehén</a>
</nav>

<p class="lead"><?php echo $trip['Trip']['short_description']; ?></p>
<div>
  <a class="important" href="#prices">Időpontok &amp; ár &darr;</a>
  <a class="quote" href="#">Ajánlatkérés &raquo;</a>
</div>
</div>
</section>

<?php print_r($trip); ?>

<section class="section">
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

<section class="section gallery">
<h2>Látnivalók</h2>
<div class="cont">
  <?php
    foreach($trip['Sight'] as $sight){
      echo $this->Html->link(($this->Html->image($sight['image_file'], array('alt' => $sight['name'])) . '<span>' . $sight['name'] . '</span>'), '#', array('escape' => false));
    } 
  ?>
  <a rel="gallery" href="img/asd.jpeg" class="fancybox" title="Sample title"><img src="img/asd.jpeg" /></a>
  <a rel="gallery" href="img/asd.jpeg" class="fancybox" title="Sample title"><img src="img/asd.jpeg" /></a>
  <a rel="gallery" href="img/asd.jpeg" class="fancybox" title="Sample title"><img src="img/asd.jpeg" /></a>
  <a rel="gallery" href="img/asd.jpeg" class="fancybox" title="Sample title"><img src="img/asd.jpeg" /></a>
</div>
</section>

<section class="section share">
<h2>Megosztás</h2> <div><a href="mailto:pixelephant@pixelephant.hu?body=szuper&subject=7merfold"><span class="icon" aria-hidden="true" data-icon="e"></span></a><a target="_blank" href="http://www.facebook.com/share.php?u=www.pixelephant.hu"><span class="icon" aria-hidden="true" data-icon="f"></span></a></div>
</section>

<section class="section getquote">
<a href="#">Ajánlatkérés &raquo;</a>
<p>Ne aggódj, ha valamin változtatnál nálunk megteheted!</p>
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
    <a href="#">Ajánlatkérés &raquo;</a>
    <p>Ne aggódj, ha valamin változtatnál nálunk megteheted!</p>
  </div>
</div>
</section>
<section class="section ajax">
  <h2><a href="ajax.html">Vízum <span>+</span></a></h2>
  <div class="cont hidden">
    
  </div>
</section>
<section class="section ajax">
  <h2><a href="ajax.html"><?php echo $trip['Country']['name']; ?> <span>+</span></a></h2>
  <div class="cont hidden">
    
  </div>
</section>                                

<?php if($trip['Trip']['hajozz'] == 1){ ?>
  <div class="cta boat">
    <h3>Gyere hajózni!</h3>
    <span class="icon" aria-hidden="true" data-icon="b"></span>
    <h2><a href="#">hajozz.eu</a></h2>
  </div>
<?php } ?>
                                                                                                                                                                                                
<?php echo $this->element('quote'); ?>