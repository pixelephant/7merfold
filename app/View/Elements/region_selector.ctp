<section class="section selecter">
  <h2 class="clearfix info"><span><?php echo $country_name; ?><?php echo $this->Html->link('<span class="icon" aria-hidden="true" data-icon="&#xe00d;"></span>', '/orszag/'.$country_slug, array("escape"=>false)); ?></span><a href="#" class="select-trigger">Régiók</a></h2>
  <ul>
    <?php foreach($regions as $region){
      echo '<li>' . $this->Html->link($region['Region']['name'], '#' . str_replace(' ', '-', $region['Region']['name'])) . '</li>';
    } ?>
    <li class="close"><a href="#">&times;</a></li>
  </ul>
</section>