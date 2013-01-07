<section class="section collapsible <?php echo $closed ? "closed" : ""; ?>" id="arak">
<h2 <?php echo $closed ? "" : 'class="open"'; ?>><a href="#">Árak és infók<span><?php echo $closed ? "+" : "-"; ?></span></a></h2>
<div class="cont">
    <div>
        <div class="block">
            <h3>Időpont</h3>
            <p><?php echo $trip['Trip']['travel_date']; ?></p>
        </div>
        <div class="block">
            <h3>Utazás időtartama</h3>
            <p><?php echo $trip['Trip']['day']; ?></p>
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
        <div class="block">
            <h3>Árleírás</h3>
            <p><?php echo $trip['Trip']['price']; ?></p>
        </div>
    </div>
</div>
</section>