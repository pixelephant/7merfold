<div class="actions">
	<?php echo $this->element('admin/admin_menu'); ?>
</div>

<div class="trips index">
	<h2><?php echo $name; ?></h2>
	<table cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
					<th><?php echo 'Megjelenítve'; ?></th>
					<th><?php echo 'Érték'; ?></th>
					<th><?php echo 'Id'; ?></th>
					<th>Műveletek</th>
			</tr>
			<?php foreach ($contacts as $key => $contact) { ?>				
				<tr>
					<td><?php echo $contact['Contact']['display']; ?></td>
					<td><?php echo $contact['Contact']['value']; ?></td>
					<td><?php echo $contact['Contact']['id']; ?></td>
					<td class="actions">						
						<?php echo $this->Html->link('Szerkeszt', '/admin/contacts/edit/'.$contact['Contact']['id']); ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>