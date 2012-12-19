<div id="sidebar">
  <?php echo $this->element('quote_box'); ?>
  <section class="section" id="side-share">
    <div class="cont" syle="overflow:hidden;">
      <span class="shares"><span>Megosztás</span><a href="mailto: ?body=<?php echo $trip['Trip']['short_description']; ?>&subject=<?php echo $trip['Trip']['name']; ?>"><span class="icon" aria-hidden="true" data-icon="e"></span></a><a target="_blank" href="http://www.facebook.com/share.php?u=<?php echo $this->Html->url( null, true ); ?>"><?php echo $this->Html->image('f_logo.png'); ?></a></span>
    </div>
  </section>
</div>