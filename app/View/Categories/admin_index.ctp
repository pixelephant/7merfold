<div class="actions">
	<?php echo $this->element('admin/admin_menu'); ?>
</div>

<div class="trips index">
	<h2><?php echo $name; ?></h2>
	<table cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
					<th><?php echo $this->Paginator->sort('name', 'Név'); ?></th>
					<th><?php echo $this->Paginator->sort('id', 'Id'); ?></th>
					<th>Műveletek</th>
			</tr>
			<?php foreach ($categories as $key => $category) { ?>				
				<tr>
					<td><?php echo $category['Category']['title']; ?></td>
					<td><?php echo $category['Category']['id']; ?></td>
					<td class="actions">						
						<?php echo $this->Html->link('Szerkeszt', '/admin/categories/edit/'.$category['Category']['id']); ?>
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