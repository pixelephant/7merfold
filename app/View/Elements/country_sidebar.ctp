<div id="sidebar" class="no-flick">
   <?php echo $this->element('quote_box'); ?>
   <section class="section" id="side-share">
    <div class="cont">
      <span class="shares"><span>Megosztás</span><a href="mailto: ?body=<?php echo $this->App->trimText(strip_tags($country['Country']['information']), 300) . "%0D" . 'A teljes ajánlat elérhető az alábbi címen: ' . $this->Html->url( null, true ); ?>&subject=7Mérföld Utazási Iroda - <?php echo $country['Country']['name']; ?>"><span class="icon" aria-hidden="true" data-icon="&#xe003;"></span></a><a target="_blank" href="http://www.facebook.com/share.php?u=<?php echo $this->Html->url( null, true ); ?>"><?php echo $this->Html->image('f_logo.png'); ?></a></span>
    </div>
  </section>
  <section id="side-news" class="section">
    <h2>Legfrissebb hír</h2>
    <div class="cont">
      <a href="<?php echo $this->webroot . 'hirek/' . $news['News']['slug']; ?>">
        <?php echo (!empty($news['News']['image_file']) ? $this->Html->image($news['News']['image_file']) : ''); ?>
        <h3><?php echo $news['News']['title']; ?></h3>
      </a>
    </div>
  </section>
</div>