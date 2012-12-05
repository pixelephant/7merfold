<section class="section selecter">
  <h2 class="clearfix"><span><?php echo $country_name; ?></span><a href="#" class="select-trigger">Régiók</a></h2>
  <ul>
    <?php foreach($regions as $region){
      echo '<li>' . $this->Html->link($region['Region']['name'], '#' . $region['Region']['name']) . '</li>';
    } ?>
    <li class="close"><a href="#">&times;</a></li>
  </ul>
</section>