<div id="sidebar" class="no-flick">
  <section class="section">
  	<h2>Tartalom</h2>
  	<div class="cont">
  		<nav id="inline-nav">
    <?php echo $this->element('nav', array('trip_type' => $trip_type)) ?>
    <a href="#vizum">Vízum</a>
    <a href="#<?php echo $trip['Country']['name']; ?>"><?php echo $trip['Country']['name']; ?></a>
  </nav>
  	</div>
  </section>
   <?php echo $this->element('quote_box'); ?>
   <section class="section" id="side-share">
    <div class="cont">
      <span class="shares"><span>Megosztás</span><a href="mailto: ?body=<?php echo $trip['Trip']['short_description']; ?>&subject=<?php echo $trip['Trip']['name']; ?>"><span class="icon" aria-hidden="true" data-icon="e"></span></a><a target="_blank" href="http://www.facebook.com/share.php?u=<?php echo $this->Html->url( null, true ); ?>"><?php echo $this->Html->image('f_logo.png'); ?></a></span>
    </div>
  </section>
</div>