<section class="section collapsible <?php echo $closed ? "closed" : ""; ?>" id="leiras">
<h2 <?php echo $closed ? "" : 'class="open"'; ?>><a href="#">Leírás<span><?php echo $closed ? "+" : "-"; ?></span></a></h2>
<div class="cont">
  <?php echo $description; ?>
</div>
</section>