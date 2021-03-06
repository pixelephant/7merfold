<div id="sidebar" class="no-flick">
   <?php echo $this->element('quote_box'); ?>
   <section class="section" id="side-share">
    <div class="cont">
      <span class="shares"><span>Megosztás</span><a href="mailto: ?body=<?php echo strip_tags($trip['Trip']['short_description']) . "%0D" . 'A teljes ajánlat elérhető az alábbi címen: ' . $this->Html->url( null, true ); ?>&subject=7Mérföld Utazási Iroda - <?php echo $trip['Trip']['name']; ?>"><span class="icon" aria-hidden="true" data-icon="&#xe003;"></span></a><a target="_blank" href="http://www.facebook.com/share.php?u=<?php echo $this->Html->url( null, true ); ?>"><?php echo $this->Html->image('f_logo.png'); ?></a></span>
    </div>
  </section>
  <section id="side-news" class="section">
    <h2>Legfrissebb hír</h2>
    <div class="cont">
      <a href="<?php echo $this->webroot . 'hirek/' . $news['News']['slug']; ?>">
        <?php echo (!empty($news['News']['image_file']) ? $this->Html->image($news['News']['image_file']) : ''); ?>
        <h3><?php echo $news['News']['title']; ?></h3>
      </a>
      <p>
        További híreink: 
        <?php 
          for($i=0;$i<count($all_news);$i++){
            //$all_news[$i]['News']['title']
            echo $this->Html->link(($i + 1), '/hirek/' . $all_news[$i]['News']['slug']);
            if(($i + 1) < count($all_news)){
              echo ',';
            }
          }
        ?>
      </p>
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