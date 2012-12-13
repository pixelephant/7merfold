<section class="section collapsible closed" id="arak">
<h2><a href="#">Árak és infók<span>+</span></a></h2>
<div class="cont">
    <div class="half">
        <div class="block">
            <h3>Időpont</h3>
            <p><?php echo $trip['Trip']['travel_date']; ?></p>
        </div>
        <div class="block">
            <h3>Utazás</h3>
            <p><?php echo $trip['Trip']['travel_method']; ?></p>
        </div>
        <div class="block">
            <h3>Elhelyezés</h3>
            <p><?php echo $trip['Trip']['accommodation']; ?></p>
        </div>
        <div class="block">
            <h3>Ellátás</h3>
            <p><?php echo $trip['Trip']['service']; ?></p>
        </div>
        <div class="block">
            <h3>Minimum létszám</h3>
            <p><?php echo $trip['Trip']['minimal_persons']; ?></p>
        </div>
    </div>
    <div class="half getquote">
        <a href="<?php echo $this->webroot; ?>ajanlat">Ajánlatkérés &raquo;</a>
        <p>Ne aggódj, ha valamin változtatnál nálunk megteheted!</p>
    </div>
</div>
</section>