<section class="section collapsible <?php echo $closed ? "closed" : ""; ?>" id="ellatas">
<h2 <?php echo $closed ? "" : 'class="open"'; ?>><a href="#">Ellátás<span><?php echo $closed ? "+" : "-"; ?></span></a></h2>
<div class="cont">
    <p><?php echo $trip['Trip']['service']; ?></p>
</div>
</section>