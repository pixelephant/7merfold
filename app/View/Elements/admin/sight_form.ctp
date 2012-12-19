<!-- Látványosságok -->
	<?php 
	$i = 1;
	foreach($sights as $sight){
		echo '<h3>'.$i . ". látnivaló</h3>";
	?>
		<form action="/7merfold/admin/sights/delete/<?php echo $sight['Sight']['id']; ?>" name="post_<?php echo $sight['Sight']['id']; ?>" id="post_<?php echo $sight['Sight']['id']; ?>" style="display:none;" method="post">
		<input type="hidden" name="_method" value="POST"></form>
		<a href="#" onclick="if (confirm('Biztosan törlöd?')) { document.post_<?php echo $sight['Sight']['id']; ?>.submit(); } event.returnValue = false; return false;">Töröl</a>

	<?php
		echo $this->Form->create('Sight', array('type' => 'file', 'url' => '/admin/sights/new'));
		echo $this->Form->input('id', array('type' => 'hidden', 'value' => $sight['Sight']['id']));
		echo $this->Form->input('trip_id', array('type' => 'hidden', 'value' => $sight['Sight']['trip_id']));
		echo $this->Form->input('name', array('value' => $sight['Sight']['name']));
		echo $this->Html->image($sight['Sight']['image_file'], array('width' => 100));
		echo $this->Form->input('image_file', array('type' => 'file'));
		echo $this->Form->end(__d('cake', __('Submit')));
		$i++;
	}
		echo '<h3>'.$i . ". látnivaló</h3>";
		echo $this->Form->create('Sight', array('type' => 'file', 'url' => '/admin/sights/new'));
		echo $this->Form->input('trip_id', array('type' => 'hidden', 'value' => $this->request->data['Trip']['id']));
		echo $this->Form->input('name');
		echo $this->Form->input('image_file', array('type' => 'file'));
		echo $this->Form->end(__d('cake', __('Submit')));
	?>

	<a class="cancel_button" href="javascript:history.back()">Mégsem</a>
	<!-- Látványosságok -->