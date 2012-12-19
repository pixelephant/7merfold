<!-- Program -->
	<?php 
	$i = 1;
	foreach($programs as $program){
		echo '<h3>'.$i . ". nap programja</h3>";
	?>
		<form action="/7merfold/admin/programs/delete/<?php echo $program['Program']['id']; ?>" name="post_<?php echo $program['Program']['id']; ?>" id="post_<?php echo $program['Program']['id']; ?>" style="display:none;" method="post">
		<input type="hidden" name="_method" value="POST"></form>
		<a href="#" onclick="if (confirm('Biztosan törlöd?')) { document.post_<?php echo $program['Program']['id']; ?>.submit(); } event.returnValue = false; return false;">Töröl</a>

	<?php
		echo $this->Form->create('Program', array('type' => 'file', 'url' => '/admin/programs/new'));
		echo $this->Form->input('id', array('type' => 'hidden', 'value' => $program['Program']['id']));
		echo $this->Form->input('trip_id', array('type' => 'hidden', 'value' => $program['Program']['trip_id']));
		echo $this->Form->input('name', array('value' => $program['Program']['name']));
		echo $this->Form->input('description', array('value' => $program['Program']['description']));
		echo $this->Form->input('image_file', array('type' => 'file'));
		echo $this->Html->image($program['Program']['image_file'], array('width' => 100));
		echo $this->Form->end(__d('cake', __('Submit')));
		$i++;
	}
		echo '<h3>'.$i . ". nap programja</h3>";
		echo $this->Form->create('Program', array('type' => 'file', 'url' => '/admin/programs/new'));
		echo $this->Form->input('trip_id', array('type' => 'hidden', 'value' => $this->request->data['Trip']['id']));
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('image_file', array('type' => 'file'));
		echo $this->Form->end(__d('cake', __('Submit')));
	?>

	<a class="cancel_button" href="javascript:history.back()">Mégsem</a>
	<!-- Program -->