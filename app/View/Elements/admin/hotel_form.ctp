<!-- Hotel -->
	<?php 
	$i = 1;
	foreach($hotels as $hotel){
		echo '<h3>'.$i . ". hotel</h3>";
	?>
		<form action="/7merfold/admin/hotels/delete/<?php echo $hotel['Hotel']['id']; ?>" name="post_<?php echo $hotel['Hotel']['id']; ?>" id="post_<?php echo $hotel['Hotel']['id']; ?>" style="display:none;" method="post">
		<input type="hidden" name="_method" value="POST"></form>
		<a href="#" onclick="if (confirm('Biztosan törlöd?')) { document.post_<?php echo $hotel['Hotel']['id']; ?>.submit(); } event.returnValue = false; return false;">Töröl</a>

	<?php
		echo $this->Form->create('Hotel', array('type' => 'file', 'url' => '/admin/hotels/new'));
		echo $this->Form->input('id', array('type' => 'hidden', 'value' => $hotel['Hotel']['id']));
		echo $this->Form->input('trip_id', array('type' => 'hidden', 'value' => $hotel['Hotel']['trip_id']));
		echo $this->Form->input('name', array('value' => $hotel['Hotel']['name']));
		echo $this->Form->input('star_rating', array('value' => $hotel['Hotel']['star_rating']));
		// echo $this->Form->input('accommodation', array('value' => $hotel['Hotel']['accommodation']));
		echo $this->Form->input('price', array('value' => $hotel['Hotel']['price']));
		echo $this->Form->input('description', array('value' => $hotel['Hotel']['description']));
		echo $this->Form->end(__d('cake', __('Submit')));
		$i++;
	}
		echo '<h3>'.$i . ". hotel</h3>";
		echo $this->Form->create('Hotel', array('type' => 'file', 'url' => '/admin/hotels/new'));
		echo $this->Form->input('trip_id', array('type' => 'hidden', 'value' => $this->request->data['Trip']['id']));
		echo $this->Form->input('name');
		echo $this->Form->input('star_rating');
		// echo $this->Form->input('accommodation');
		echo $this->Form->input('price');
		echo $this->Form->input('description');
		
		echo $this->Form->end(__d('cake', __('Submit')));
	?>

	<a class="cancel_button" href="javascript:history.back()">Mégsem</a>
	<!-- Hotel -->