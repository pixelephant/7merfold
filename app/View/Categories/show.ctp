<?php $this->Html->script('list', array('inline' => false)); ?>
<?php $this->Html->css('list', null, array('inline' => false)); ?>

<section class="section selecter">
  <h2 class="clearfix"><span><?php echo $trips[0]['Country']['name']; ?></span><a href="#" class="select-trigger">Régiók</a></h2>
  <ul>
    <?php foreach($regions as $region){
      echo '<li>' . $this->Html->link($region['Region']['name'], '#' . $region['Region']['name']) . '</li>';
    } ?>
    <li class="close"><a href="#">&times;</a></li>
  </ul>
</section>
<section class="section offer-list">
  <?php 
    foreach($regions as $region){
      echo $this->element('region_box', array('region_id' => $region['Region']['id'], 'region_name' => $region['Region']['name'], 'category_id' => $category_id));
    }
  ?>
  <!-- <div class="region" id="kreta">
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
    </a> -->
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

<?php echo $this->element('quote'); ?>