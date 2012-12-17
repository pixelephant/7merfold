<div class="actions">
	<?php echo $this->element('admin/admin_menu'); ?>
</div>

<div class="trips form">
<?php
	echo $this->Form->create('Trip', array('type' => $form_type, 'url' => '/admin/trips/new'));
	echo $this->Form->input('category_id', array('type' => 'hidden', 'value' => 5));
	echo $this->Form->input('name');
	echo $this->Form->input('description');
	echo $this->Form->input('short_description');
	echo $this->Form->input('travel_date');
	echo $this->Form->input('hajozz');
	echo $this->Form->input('country_id', array('default' => $this->request['data']['Country']));
	echo $this->Form->input('region_id');
	echo $this->Form->input('accommodation');
	echo $this->Form->input('travel_method');
	echo $this->Form->input('minimal_persons');
	echo $this->Form->input('extra');
	echo $this->Form->input('extra_title');
	echo $this->Form->input('star_rating');
	echo $this->Form->input('day');
	echo $this->Form->input('special');
	echo $this->Form->input('service');
	echo $this->Form->input('keywords');
	echo $this->Form->input('title');
	echo $this->Form->end(__d('cake', __('Submit')));
?>
	<a href="javascript:history.back()">Mégsem</a> <br>
	<!-- Program -->
	<?php 
	$i = 1;
	foreach($programs as $program){
		echo $i . ". nap programja";
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
		echo $this->Html->image($program['Program']['image_file']);
		echo $this->Form->end(__d('cake', __('Submit')));
		$i++;
	}
		echo $i . ". nap programja";
		echo $this->Form->create('Program', array('type' => 'file', 'url' => '/admin/programs/new'));
		echo $this->Form->input('trip_id', array('type' => 'hidden', 'value' => $this->request->data['Trip']['id']));
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('image_file', array('type' => 'file'));
		echo $this->Form->end(__d('cake', __('Submit')));
	?>

	<a href="javascript:history.back()">Mégsem</a>
	<!-- Program -->

	<!-- Hotel -->
	<?php 
	$i = 1;
	foreach($hotels as $hotel){
		echo $i . ". hotel";
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
		echo $this->Form->input('accommodation', array('value' => $hotel['Hotel']['accommodation']));
		echo $this->Form->input('price', array('value' => $hotel['Hotel']['price']));
		echo $this->Form->input('description', array('value' => $hotel['Hotel']['description']));
		echo $this->Form->end(__d('cake', __('Submit')));
		$i++;
	}
		echo $i . ". hotel";
		echo $this->Form->create('Hotel', array('type' => 'file', 'url' => '/admin/hotels/new'));
		echo $this->Form->input('trip_id', array('type' => 'hidden', 'value' => $this->request->data['Trip']['id']));
		echo $this->Form->input('name');
		echo $this->Form->input('star_rating');
		echo $this->Form->input('accommodation');
		echo $this->Form->input('price');
		echo $this->Form->input('description');
		
		echo $this->Form->end(__d('cake', __('Submit')));
	?>

	<a href="javascript:history.back()">Mégsem</a>
	<!-- Hotel -->

	<!-- Látványosságok -->
	<?php 
	$i = 1;
	foreach($sights as $sight){
		echo $i . ". látványosság";
	?>
		<form action="/7merfold/admin/sights/delete/<?php echo $sight['Sight']['id']; ?>" name="post_<?php echo $sight['Sight']['id']; ?>" id="post_<?php echo $sight['Sight']['id']; ?>" style="display:none;" method="post">
		<input type="hidden" name="_method" value="POST"></form>
		<a href="#" onclick="if (confirm('Biztosan törlöd?')) { document.post_<?php echo $sight['Sight']['id']; ?>.submit(); } event.returnValue = false; return false;">Töröl</a>

	<?php
		echo $this->Form->create('Hotel', array('type' => 'file', 'url' => '/admin/sights/new'));
		echo $this->Form->input('id', array('type' => 'hidden', 'value' => $sight['Sight']['id']));
		// echo $this->Form->input('trip_id', array('type' => 'hidden', 'value' => $sight['Sight']['trip_id']));
		echo $this->Form->end(__d('cake', __('Submit')));
		$i++;
	}
		echo $i . ". látványosság";
		echo $this->Form->create('Sight', array('type' => 'file', 'url' => '/admin/sights/new'));
		// echo $this->Form->input('trip_id', array('type' => 'hidden', 'value' => $this->request->data['Trip']['id']));
		
		echo $this->Form->end(__d('cake', __('Submit')));
	?>

	<a href="javascript:history.back()">Mégsem</a>
	<!-- Látványosságok -->
</div>