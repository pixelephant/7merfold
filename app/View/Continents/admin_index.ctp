<div class="actions">
	<?php echo $this->element('admin/admin_menu'); ?>
</div>

<div class="trips index">
	<h2><?php echo $name; ?></h2>
	<?php echo $this->Html->link('Új kontinens', '/admin/continents/new'); ?>
	<table cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
					<th><?php echo $this->Paginator->sort('name', 'Név'); ?></th>
					<th><?php echo $this->Paginator->sort('created', 'Létrehozás'); ?></th>
					<th><?php echo $this->Paginator->sort('id', 'Id'); ?></th>
					<th>Műveletek</th>
			</tr>
			<?php foreach ($continents as $key => $continent) { ?>				
				<tr>
					<td><?php echo $continent['Continent']['name']; ?></td>
					<td><?php echo $continent['Continent']['created']; ?></td>
					<td><?php echo $continent['Continent']['id']; ?></td>
					<td class="actions">						
						<?php echo $this->Html->link('Szerkeszt', '/admin/continents/edit/'.$continent['Continent']['id']); ?>
						<form action="<?php echo $this->Html->url('/admin/continents/delete/' . $continent['Continent']['id']); ?>" name="post_<?php echo $continent['Continent']['id']; ?>" id="post_<?php echo $continent['Continent']['id']; ?>" style="display:none;" method="post">
						<input type="hidden" name="_method" value="POST"></form>
						<a href="#" onclick="if (confirm('Biztosan törlöd?')) { document.post_<?php echo $continent['Continent']['id']; ?>.submit(); } event.returnValue = false; return false;">Töröl</a>
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