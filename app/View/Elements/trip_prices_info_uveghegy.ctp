<section class="section collapsible closed" id="arak">
<h2><a href="#">Árak és infók<span>+</span></a></h2>
<div class="cont">
    <div class="block">
        <h3>Érkezési nap/minimum tartózkodás</h3>
        <p><?php echo $trip['Trip']['day']; ?></p>
    </div>
    <div class="block">
        <h3>Árak</h3>
        <p><?php echo $trip['Trip']['price']; ?></p>
    </div>
    <div class="block">
        <h3>Ár tartalmazza</h3>
        <p><?php echo $trip['Trip']['travel_price_includes']; ?></p>
    </div>
    <div class="block">
        <h3>Bomba ajánlat</h3>
        <p><?php echo $trip['Trip']['special']; ?></p>
    </div>
</div>
</section>