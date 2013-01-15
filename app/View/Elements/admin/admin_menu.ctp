<h3>Menü</h3>
<ul>
	<?php 
		if(isset($additional)){
			echo $additional;
		}
	?>
	<li><?php echo $this->Html->link('Városi kalandok', '/admin/trips/1'); ?></li>
	<li><?php echo $this->Html->link('Körutazások', '/admin/trips/2'); ?></li>
	<li><?php echo $this->Html->link('Üveghegyen túl', '/admin/trips/3'); ?></li>
	<li><?php echo $this->Html->link('Üveghegyen innen', '/admin/trips/4'); ?></li>
	<li><?php echo $this->Html->link('Felfedezőutak', '/admin/trips/5'); ?></li>
	<!-- <li><?php echo $this->Html->link('Új utazás', '/admin/trips/add'); ?></li> -->
	<li><?php echo $this->Html->link('Hírek', '/admin/news'); ?></li>
	<!-- <li><?php echo $this->Html->link('Új hír', '/admin/news/add'); ?></li> -->
	<li><?php echo $this->Html->link('Országok', '/admin/countries'); ?></li>
	<!-- <li><?php echo $this->Html->link('Új ország', '/admin/countries/add'); ?></li> -->
	<li><?php echo $this->Html->link('Régiók', '/admin/regions'); ?></li>
	<li><?php echo $this->Html->link('Kontinensek', '/admin/continents'); ?></li>
	<!-- <li><?php echo $this->Html->link('Új régió', '/admin/regions/add'); ?></li> -->
	<li><?php echo $this->Html->link('Kategóriák', '/admin/categories'); ?></li>
	<li><?php echo $this->Html->link('Tartalmak', '/admin/contents'); ?></li>
	<!-- <li><?php echo $this->Html->link('Új kategória', '/admin/categories/add'); ?></li> -->
	<!-- <li><?php echo $this->Html->link('Programok', '/admin/programs'); ?></li> -->
	<!-- <li><?php echo $this->Html->link('Új program', '/admin/programs/add'); ?></li> -->
	<!-- <li><?php echo $this->Html->link('Hotelek', '/admin/hotels'); ?></li> -->
	<!-- <li><?php echo $this->Html->link('Új hotel', '/admin/hotels/add'); ?></li> -->
	<!-- <li><?php echo $this->Html->link('Látnivalók, Hotel képek', '/admin/sights'); ?></li> -->
	<!-- <li><?php echo $this->Html->link('Új látnivaló, Hotel kép', '/admin/sights/add'); ?></li> -->
	<!-- <li><?php echo $this->Html->link('Útvonalak', '/admin/maps'); ?></li> -->
	<!-- <li><?php echo $this->Html->link('Új útvonal', '/admin/maps/add'); ?></li> -->
</ul>