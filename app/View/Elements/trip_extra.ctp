<section class="section collapsible <?php echo $closed ? "closed" : ""; ?>" id="<?php echo $id ?>">
<h2><a href="#"><?php echo $title ?><span><?php echo $closed ? "+" : "-"; ?></span></a></h2>
<div class="cont">
  <?php echo $content; ?>
</div>
</section>