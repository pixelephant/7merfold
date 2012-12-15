<?php if($trip_type == '1'){ ?>
	<a href="#leiras">Leírás</a>
	<a href="#latnivalok">Látnivalók</a>
	<a href="#hotelek">Hotelek</a>
	<a href="#fontosinformaciok">Fontos információk</a>
<?php } ?>

<?php if($trip_type == '2'){ ?>
	<a href="#program">Program</a>
	<a href="#arak">Árak és infók</a>
<?php } ?>

<?php if($trip_type == '3' || $trip_type == '4'){ ?>
	<a href="#leiras">Leírás</a>
	<a href="#hotel">Képek a hotelről</a>
	<a href="#arak">Árak és infók</a>
<?php } ?>

<?php if($trip_type == '5'){ ?>
	<a href="#program">Program</a>
	<a href="#arak">Árak és infók</a>
	<a href="#utvonal">Útvonal</a>
<?php } ?>