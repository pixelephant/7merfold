<section class="section selecter">
  <h2 class="clearfix"><span><?php echo $country_name; ?><?php echo $this->Html->link('(i)', '/orszag/'.$country_slug); ?></span><a href="#" class="select-trigger">Régiók</a></h2>
  <ul>
    <?php foreach($regions as $region){
      echo '<li>' . $this->Html->link($region['Region']['name'], '#' . str_replace(' ', '-', $region['Region']['name'])) . '</li>';
    } ?>
    <li class="close"><a href="#">&times;</a></li>
  </ul>
</section>