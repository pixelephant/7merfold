<h3>Menü</h3>
<ul>
	<?php 
		if(isset($additional)){
			echo $additional;
		}
	?>
	<li><?php echo $this->Html->link('Utazások', '/admin/trips'); ?></li>
	<li><?php echo $this->Html->link('Új utazás', '/admin/trips/add'); ?></li>
	<li><?php echo $this->Html->link('Hírek', '/admin/news'); ?></li>
	<li><?php echo $this->Html->link('Új hír', '/admin/news/add'); ?></li>
	<li><?php echo $this->Html->link('Országok', '/admin/countries'); ?></li>
	<li><?php echo $this->Html->link('Új ország', '/admin/countries/add'); ?></li>
	<li><?php echo $this->Html->link('Régiók', '/admin/regions'); ?></li>
	<li><?php echo $this->Html->link('Új régió', '/admin/regions/add'); ?></li>
	<li><?php echo $this->Html->link('Kategóriák', '/admin/categories'); ?></li>
	<li><?php echo $this->Html->link('Új kategória', '/admin/categories/add'); ?></li>
	<li><?php echo $this->Html->link('Programok', '/admin/programs'); ?></li>
	<li><?php echo $this->Html->link('Új program', '/admin/programs/add'); ?></li>
	<li><?php echo $this->Html->link('Hotelek', '/admin/hotels'); ?></li>
	<li><?php echo $this->Html->link('Új hotel', '/admin/hotels/add'); ?></li>
	<li><?php echo $this->Html->link('Látványosságok, Hotel képek', '/admin/sights'); ?></li>
	<li><?php echo $this->Html->link('Új látványosság, hotel kép', '/admin/sights/add'); ?></li>
</ul>