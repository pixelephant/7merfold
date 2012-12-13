<?php $this->Html->script(array('index','carousel'), array('inline' => false)); ?>
<?php $this->Html->css('carousel', null, array('inline' => false)); ?>

<section class="section arrow_box" id="usp">
    <div class="cont">
    <h2 class="fadeInRight">Személyre szabunk!</h2>
      <p class="fadeInRight"> A 7mérföld a személyre szabott utak specialistája, legyen az egy családi nyaralás, hétvégi városlátogatás, vagy céges csapatépítő túra. Irodánk a vízumintézéstől a programok megszervezésén át egészen az asztalfoglalásokig elintéz mindent.</p>
      <a class="fadeInRight" href="#">Fedezd fel &raquo;</a>
    </div>
</section>


<section class="" id="explore">
  <div class="m">
    <?php foreach($categories_top as $category){
      echo $this->Html->link($this->Html->image('1.png', array('alt' => $category['Category']['name'])) . '<h3>' . $category['Category']['name'] .'</h3>', '/'.$category['Category']['slug'], array('class' => 'offer pulse', 'escape' => false));
    } ?>
    <!-- <a class="offer pulse" href="#">
      <img src="img/1.png" alt="">
      <h3>Városi kalandok</h3>
    </a>
    <a class="offer pulse" href="#">
      <img src="img/1.png" alt="">
      <h3>Felfedezőutak</h3>
    </a>
    <a class="offer pulse" href="#">
      <img src="img/1.png" alt="">
      <h3>Üveghegyen innen</h3>
    </a> -->
  </div>
  <div class="t">
    <?php foreach($categories_bottom as $category){
      echo $this->Html->link($this->Html->image('1.png', array('alt' => $category['Category']['name'])) . '<h3>' . $category['Category']['name'] .'</h3>', '/'.$category['Category']['slug'], array('class' => 'offer pulse', 'escape' => false));
    } ?>
    <!-- <a class="offer pulse" href="#">
    <img src="img/1.png" alt="">
    <h3>Városi kalandok</h3>
  </a>
  <a class="offer pulse" href="#">
    <img src="img/1.png" alt="">
    <h3>Felfedezőutak</h3>
  </a> -->
  </div>
</section>

<section class="section" id="card">
  <h2>Ajándékozzon élményt!</h2>
  <div class="cont">
    <img src="img/loyalty.png" alt="">
    <?php echo $this->Html->link('Ajándékutalványok &raquo;', '/ajandekutalvany', array('escape' => false)); ?>
  </div>
</section>

<section class="section" id="company">
  <h2>Csapatépítés</h2>
  <div class="cont">
    <p>Egy csapat akkor működik jól, ha a tagok megbíznak egymában. Nézze meg céges ajánlatainkat!</p>
    <?php echo $this->Html->link('Ajánlatunk &raquo;', '/cegeknek', array('escape' => false)); ?>
    <img src="img/csapat.gif" alt="">
  </div>
</section>



<section class="slider section">
<h2>Legfrisebb utak</h2>
  <div class="cont">
    <div class="flex-container">
      <div class="flexslider">
        <ul class="slides">
          <?php 
            echo $this->element('newest_trips_carousel', array('trips' => $newest_trips));
          ?>  
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="section" id="news">
  <h2>Hírek</h2>
  <div class="cont">
  <?php foreach($news as $new){ ?>
    <div class="news">
      <?php echo $this->Html->image($new['News']['image_file'], array('alt' => $new['News']['title'], 'class' => 'img')); ?>
      <div class="bd">
        <h3><?php echo $new['News']['title']; ?></h3>
        <p><?php echo $new['News']['content']; ?></p>
        <?php echo $this->Html->link('Tovább &raquo;', '/hirek/' . $new['News']['slug'], array('escape' => false)); ?>
      </div>
    </div>
  <?php } ?>
  </div>
</section>

<section id="newsletter" class="section">
  <h2>Iratkozzon fel hírlevelünkre!</h2>
  <h3>és nyerhet 10% kedvezményt bármelyik útra</h3>
  <form action="#" id="newsletter-form">
    <input type="text" name="name" id="name" placeholder="Név">
    <input type="email" name="email" id="email" placeholder="Email cím">
    <input type="submit" value="Feliratkozom &raquo;">
  </form>
</section>

<section class="section">
  <h2>Utazási irodánkról</h2>
  <div class="cont">
    <p>Talán mindenki gyermekkori emlékei között ott él még az a csodálatos hétmérföldes csizma, amellyel a legkisebb fiú túllépett teret és időt, és messzi vidékekre juthatott el. Ki ne vágyna egy ilyen <strong>csodás csizmára?!</strong></p>
  </div>
</section>