<section class="section collapsible closed" id="arak">
<h2><a href="#">Árak és infók<span>+</span></a></h2>
<div class="cont">
  <div class="block">
    <h3>Időpont</h3>
    <p><?php echo $trip['Trip']['travel_date']; ?></p>

    <h3>Utazás</h3>
    <p><?php echo $trip['Trip']['travel_method']; ?></p>

    <h3>Elhelyezés</h3>
    <p><?php echo $trip['Trip']['accommodation']; ?></p>

    <h3>Ellátás</h3>
    <p><?php echo $trip['Trip']['service']; ?></p>

    <h3>Minimum létszám</h3>
    <p><?php echo $trip['Trip']['minimal_persons']; ?></p>
  </div>
</div>
</section>