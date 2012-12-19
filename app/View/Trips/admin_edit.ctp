<div class="actions">
	<?php echo $this->element('admin/admin_menu'); ?>
</div>
<div class="trips form">
<?php
	// echo $this->Form->create('Trip', array('type' => $form_type, 'url' => '/admin/trips/new'));
	// echo $this->Form->input('category_id', array('type' => 'hidden', 'value' => 5));
	// echo $this->Form->input('name');
	// echo $this->Form->input('description');
	// echo $this->Form->input('short_description');
	// echo $this->Form->input('travel_date');
	// echo $this->Form->input('hajozz');
	// echo $this->Form->input('country_id', array('default' => $this->request['data']['Country']));
	// echo $this->Form->input('region_id', array('empty' => 'Nincs régió'));
	// echo $this->Form->input('accommodation');
	// echo $this->Form->input('travel_method');
	// echo $this->Form->input('minimal_persons');
	// echo $this->Form->input('extra');
	// echo $this->Form->input('extra_title');
	// echo $this->Form->input('star_rating');
	// echo $this->Form->input('day');
	// echo $this->Form->input('special');
	// echo $this->Form->input('service');
	// echo $this->Form->input('keywords');
	// echo $this->Form->input('title');
	// echo $this->Form->end(__d('cake', __('Submit')));
	echo $this->element('admin/form_' . $this->request['data']['Trip']['category_id'], array('id' => $this->request['data']['Trip']['id']));
?>
	<a class="cancel_button" href="javascript:history.back()">Mégsem</a> <br>
	
	<?php 
		if($this->request['data']['Trip']['category_id'] != '1' && $this->request['data']['Trip']['category_id'] != '3' && $this->request['data']['Trip']['category_id'] != '4'){
			echo $this->element('admin/program_form');
		}
	?>	

	<?php 
		if($this->request['data']['Trip']['category_id'] == '1'){
			echo $this->element('admin/hotel_form'); 
		}
	?>	

	<?php echo $this->element('admin/sight_form'); ?>

</div>