<div id="sidebar" class="no-flick">
   <?php echo $this->element('quote_box'); ?>
   <section class="section" id="side-share">
    <div class="cont">
      <span class="shares"><span>Megosztás</span><a href="mailto: ?body=<?php echo strip_tags($trip['Trip']['short_description']); ?>&subject=<?php echo $trip['Trip']['name']; ?>"><span class="icon" aria-hidden="true" data-icon="&#xe003;"></span></a><a target="_blank" href="http://www.facebook.com/share.php?u=<?php echo $this->Html->url( null, true ); ?>"><?php echo $this->Html->image('f_logo.png'); ?></a></span>
    </div>
  </section>
  <section class="section" id="side-hajozz">
  <?php if($trip['Trip']['hajozz'] == 1){ ?>
  <div class="cta boat">
    <h3>Gyere hajózni!</h3>
    <span class="icon" aria-hidden="true" data-icon="&#xe005;"></span>
    <h2><a href="http://www.hajozz.eu" target="_blank">hajozz.eu</a></h2>
  </div>
  <?php } ?>
  </section>
</div>