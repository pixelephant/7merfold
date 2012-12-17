<div class="actions">
	<?php echo $this->element('admin/admin_menu'); ?>
</div>

<div class="trips index">
	<h2>Utak</h2>
	<table cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
					<th><a href="/7merfold/admin/trips/index/sort:id/direction:asc">Id</a></th>
					<th><a href="/7merfold/admin/trips/index/sort:title/direction:asc">Cím</a></th>
					<th><a href="/7merfold/admin/trips/index/sort:created/direction:asc">Létrehozás</a></th>
					<th>Műveletek</th>
			</tr>
			<?php foreach ($trips as $key => $trip) { ?>				
				<tr>
					<td><?php echo $trip['Trip']['id']; ?></td>
					<td><?php echo $trip['Trip']['title']; ?></td>
					<td><?php echo $trip['Trip']['created']; ?></td>
					<td class="actions">
						<a href="/7merfold/admin/trips/edit/<?php echo $trip['Trip']['id']; ?>">Szerkeszt</a>
						<form action="/7merfold/admin/trips/delete/<?php echo $trip['Trip']['id']; ?>" name="post_<?php echo $trip['Trip']['id']; ?>" id="post_<?php echo $trip['Trip']['id']; ?>" style="display:none;" method="post">
						<input type="hidden" name="_method" value="POST"></form>
						<a href="#" onclick="if (confirm('Biztosan törlöd?')) { document.post_<?php echo $trip['Trip']['id']; ?>.submit(); } event.returnValue = false; return false;">Töröl</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
		<p>1 oldal 1 oldalból, 2 sor mutatva a 2 sorból, első elem: 1, utolsó elem: 2</p>
		<div class="paging">
		<span class="prev disabled">&lt; előző</span><span class="next disabled">következő &gt;</span>	</div>
</div>