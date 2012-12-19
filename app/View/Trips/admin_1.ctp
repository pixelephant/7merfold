<div class="actions">
	<?php echo $this->element('admin/admin_menu'); ?>
</div>

<div class="trips index">
	<h2><?php echo $name; ?></h2>
	<?php echo $this->Html->link('Új út', '/admin/trips/new?type_id=' . $id); ?>
	<table cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
					<th><?php echo $this->Paginator->sort('name', 'Cím'); ?></th>
					<th><?php echo $this->Paginator->sort('created', 'Létrehozás'); ?></th>
					<th><?php echo $this->Paginator->sort('id', 'Id'); ?></th>
					<?php 
						if($id == 4 || $id == 3){
					?>
						<th><?php echo $this->Paginator->sort('country', 'Ország'); ?></th>
						<th><?php echo $this->Paginator->sort('region', 'Régió'); ?></th>
					<?php
						}
					 ?>
					<th>Műveletek</th>
			</tr>
			<?php foreach ($trips as $key => $trip) { ?>				
				<tr>
					<td><?php echo $trip['Trip']['name']; ?></td>
					<td><?php echo $trip['Trip']['created']; ?></td>
					<td><?php echo $trip['Trip']['id']; ?></td>

					<?php 
						if($id == 4 || $id == 3){
					?>
						<td><?php echo $trip['Country']['name']; ?></td>
						<td><?php echo $trip['Region']['name']; ?></td>
					<?php
						}
					 ?>

					<td class="actions">
						<a href="<?php echo $this->Html->url('/admin/trips/edit/'); ?><?php echo $trip['Trip']['id']; ?>">Szerkeszt</a>
						<form action="<?php echo $this->Html->url('/admin/trips/delete/'); ?><?php echo $trip['Trip']['id']; ?>" name="post_<?php echo $trip['Trip']['id']; ?>" id="post_<?php echo $trip['Trip']['id']; ?>" style="display:none;" method="post">
						<input type="hidden" name="_method" value="POST"></form>
						<a href="#" onclick="if (confirm('Biztosan törlöd?')) { document.post_<?php echo $trip['Trip']['id']; ?>.submit(); } event.returnValue = false; return false;">Töröl</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
		<p>
			<?php echo $this->Paginator->counter('{:page}. oldal a {:pages} oldal közül, jelenleg {:current} bejegyzés látható a(z) {:count} közül'); ?>
		</p>
		<div class="paging">
			<?php echo $this->Paginator->prev(' << ' . __('Előző'), array(), null, array('class' => 'prev disabled')); ?>
			<?php echo $this->Paginator->next(' >> ' . __('Következő'), array(), null, array('class' => 'next disabled')); ?>
		</div>
</div>