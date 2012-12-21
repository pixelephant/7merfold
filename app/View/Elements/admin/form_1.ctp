<?php
	echo $this->Form->create('Trip', array('type' => 'file', 'url' => '/admin/trips/new?type_id=1', 'method' => 'post'));

	if(isset($id)){
		echo $this->Form->input('id', array('type' => 'hidden', 'value' => $id));		
	}

	echo $this->Form->input('category_id', array('type' => 'hidden', 'value' => 1));
	echo $this->Form->input('slug', array('type' => 'hidden', 'value' => ''));
	echo $this->Form->input('name');
	echo $this->Form->input('country_id');	
	echo $this->Form->input('short_description');
	echo $this->Form->input('description');
	// echo $this->Form->input('travel_date');
	echo $this->Form->input('important_information');
	// echo $this->Form->input('region_id', array('empty' => 'Nincs régió'));
	// echo $this->Form->input('accommodation');
	// echo $this->Form->input('travel_method');
	// echo $this->Form->input('minimal_persons');
	echo $this->Form->input('extra', array('label' => 'Kirándulástippek'));
	echo $this->Form->input('extra_title', array('type' => 'hidden', 'value' => 'Kirándulástippek'));
	// echo $this->Form->input('star_rating');
	// echo $this->Form->input('day');
	// echo $this->Form->input('special');
	// echo $this->Form->input('service');
	echo $this->Form->input('hajozz');
	echo $this->Form->input('keywords');
	echo $this->Form->input('title');
	echo $this->Form->input('image_file', array('type' => 'file'));
	if(isset($this->request->data['Trip']['image_file']) && !empty($this->request->data['Trip']['image_file'])){
		echo $this->Html->image($this->request->data['Trip']['image_file'], array('width' => 100));	
	}
	echo $this->Form->input('circle_image_file', array('type' => 'file'));
	if(isset($this->request->data['Trip']['circle_image_file']) && !empty($this->request->data['Trip']['circle_image_file'])){
		echo $this->Html->image($this->request->data['Trip']['circle_image_file'], array('width' => 100));
	}
	echo $this->Form->end(__d('cake', __('Submit')));
?>