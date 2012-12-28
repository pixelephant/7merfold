<section class="section collapsible <?php echo $closed ? "closed" : ""; ?>" id="arak">
<h2 <?php echo $closed ? "" : 'class="open"'; ?>><a href="#">Árak és infók<span><?php echo $closed ? "+" : "-"; ?></span></a></h2>
<div class="cont">
    <!-- <div>
        <div class="block">
        <h3>Érkezési nap/minimum tartózkodás</h3>
        <p><?php echo $trip['Trip']['day']; ?></p>
        </div>
    <div class="block">
        <h3>Árak</h3>
        <p><?php echo $trip['Trip']['price']; ?></p>
        
    </div>
    <div class="block">
            <table class="table">
            <thead>
                <th>Indulási időpontok (9 nap/7 éj) </th>
                <th>Ft/fő</th>
            </thead>
            <tbody>
                <tr>
                    <td>jún. 15., 22.,<br>
aug. 17., 24., 31.,<br>
szept. 7., 14., 21., 28.</td>
<td>109 990</td>
                </tr>
                <tr>
                    <td>jún. 29.,<br>
júl. 6., 13., 20., 27.,<br>
aug. 3., 10.</td>
<td>119 990</td>
                </tr>
            </tbody>
        </table>
        </div>
    <div class="block">
        <h3>Ár tartalmazza</h3>
        <p><?php echo $trip['Trip']['travel_price_includes']; ?></p>
    </div>
    <div class="block">
        <h3>Bomba ajánlat</h3>
        <p><?php echo $trip['Trip']['special']; ?></p>
    </div>
    </div> -->
    <p><?php echo $trip['Trip']['price']; ?></p>
</div>
<?php 
    if(isset($last)){
        echo $this->element('totop');
    }
?>
</section>