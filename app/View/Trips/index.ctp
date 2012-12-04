<?php $this->Html->script('list', array('inline' => false)); ?>
<?php $this->Html->css('list', null, array('inline' => false)); ?>

<section class="section selecter">
  <h2 class="clearfix"><span>Görögország</span><a href="#" class="select-trigger">Régiók</a></h2>
  <ul>
    <li><a href="#kreta">Kréta</a></li>
    <li><a href="#korfu">Korfu</a></li>
    <li><a href="#kos">Kos</a></li>
    <li><a href="#szantorini">Szantorini</a></li>
    <li><a href="#zakynthos">Zakynthos</a></li>
    <li><a href="#rodosz">Rodosz</a></li>
    <li class="close"><a href="#">&times;</a></li>
  </ul>
</section>
<section class="section offer-list">
  <?php 
    foreach($newest_trips as $trip){
      echo $this->element('trip_offer', array('trip' => $trip));
    }
  ?>
  <div class="region" id="kreta">
    <h3>Kréta</h3>
    <a href="#" class="offer">
      <div class="img">
        <img src="img/temp.png" alt="" />
      </div>                      
      <div class="data">
        <span class="stars">&star;&star;&star;&star;</span>
        <h3>Magic Life Candia Maris Imperial</h3>
        <p class="lead">A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak. A Lorem Ipsum az 1500-as évek óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította a betûkészletét és egy példa-könyvet vagy szöveget nyomott papírra, ezt használta.</p>
        <span class="fake-a">Tovább &raquo;</span>
      </div>
    </a>
    <a href="#" class="offer">
      <div class="img">
        <img src="img/temp.png" alt="" />
      </div>                      
      <div class="data">
        <span class="stars">&star;&star;&star;&star;</span>
        <h3>Magic Life Candia Maris Imperial</h3>
        <p class="lead">A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak. A Lorem Ipsum az 1500-as évek óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította a betûkészletét és egy példa-könyvet vagy szöveget nyomott papírra, ezt használta.</p>
        <span class="fake-a">Tovább &raquo;</span>
      </div>
    </a>
    <a href="#" class="offer">
      <div class="img">
        <img src="img/temp.png" alt="" />
      </div>                      
      <div class="data">
        <span class="stars">&star;&star;&star;&star;</span>
        <h3>Magic Life Candia Maris Imperial</h3>
        <p class="lead">A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak. A Lorem Ipsum az 1500-as évek óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította a betûkészletét és egy példa-könyvet vagy szöveget nyomott papírra, ezt használta.</p>
        <span class="fake-a">Tovább &raquo;</span>
      </div>
    </a>
  </div>
  <div class="region" id="korfu">
    <h3>Korfu</h3>
    <a href="#" class="offer">
      <img src="img/1.png" alt="">
      <span class="stars">&star;&star;&star;&star;</span>
      <h3>Magic Life Candia Maris Imperial</h3>
    </a>
    <a href="#" class="offer">
      <img src="img/2.png" alt="">
      <span class="stars">&star;&star;&star;</span>
      <h3>Magic Life Candia Maris Imperial</h3>
    </a>
    <a href="#" class="offer">
      <img src="img/1.png" alt="">
      <span class="stars">&star;&star;&star;&star;</span>
      <h3>Magic Life Candia Maris Imperial</h3>
    </a>
    <a href="#" class="offer">
      <img src="img/2.png" alt="">
      <span class="stars">&star;&star;&star;</span>
      <h3>Magic Life Candia Maris Imperial</h3>
    </a>
    <a href="#" class="offer">
      <img src="img/1.png" alt="">
      <span class="stars">&star;&star;&star;&star;</span>
      <h3>Magic Life Candia Maris Imperial</h3>
    </a>
  </div>
  <div class="region" id="kos">
    <h3>Kos</h3>
    <a href="#" class="offer">
      <img src="img/1.png" alt="">
      <span class="stars">&star;&star;&star;&star;</span>
      <h3>Magic Life Candia Maris Imperial</h3>
    </a>
    <a href="#" class="offer">
      <img src="img/2.png" alt="">
      <span class="stars">&star;&star;&star;</span>
      <h3>Magic Life Candia Maris Imperial</h3>
    </a>
    <a href="#" class="offer">
      <img src="img/1.png" alt="">
      <span class="stars">&star;&star;&star;&star;</span>
      <h3>Magic Life Candia Maris Imperial</h3>
    </a>
    <a href="#" class="offer">
      <img src="img/2.png" alt="">
      <span class="stars">&star;&star;&star;</span>
      <h3>Magic Life Candia Maris Imperial</h3>
    </a>
    <a href="#" class="offer">
      <img src="img/1.png" alt="">
      <span class="stars">&star;&star;&star;&star;</span>
      <h3>Magic Life Candia Maris Imperial</h3>
    </a>
  </div>
</section>

<section class="section ajax">
    <h2><a href="ajax.html">Görögországról <span>+</span></a></h2>
    <div class="cont hidden">
    
    </div>
</section>

<section class="section ajax">
    <h2><a href="ajax.html">Krétáról <span>+</span></a></h2>
    <div class="cont hidden">
    
    </div>
</section>

<section class="section ajax">
    <h2><a href="ajax.html">Korfuról <span>+</span></a></h2>
    <div class="cont hidden">
    
    </div>
</section>

<section class="section ajax">
    <h2><a href="ajax.html">Kosról <span>+</span></a></h2>
    <div class="cont hidden">
    
    </div>
</section>



<div class="cta">
  <h3>Nem találja az utazást amit keres?</h3>
  <h2><a href="#">Írjon és valóra váltjuk!</a></h2>    
</div>