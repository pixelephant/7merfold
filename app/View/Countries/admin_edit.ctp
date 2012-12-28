<?php $this->Html->script('admin', array('inline' => false)); ?>
<div class="actions">
	<?php echo $this->element('admin/admin_menu'); ?>
</div>

<div class="countries form">
<?php
	echo $this->Form->create('Country', array('type' => 'file', 'url' => '/admin/countries/new'));
	echo $this->Form->input('id', array('type' => 'hidden', 'value' => $this->request->data['Country']['id']));
	echo $this->Form->input('slug', array('type' => 'hidden', 'value' => ''));
	echo $this->Form->input('name');
	echo $this->Form->input('continent_id');
	echo $this->Form->input('information');
	echo $this->Form->input('useful_information');
	echo $this->Form->input('keywords');
	echo $this->Form->input('title');
	echo $this->Form->input('image_file', array('type' => 'file'));
	if(isset($this->request->data['Country']['image_file']) && !empty($this->request->data['Country']['image_file'])){
		echo $this->Html->image($this->request->data['Country']['image_file'], array('width' => 100));	
	}
	echo $this->Html->image($this->request->data['Country']['image_file']);
	echo $this->Form->end(__d('cake', __('Submit')));
?>
	<a href="javascript:history.back()">Mégsem</a>

	<?php 
		foreach ($images as $image){
			echo $this->element('admin/admin_delete', array('id' => $image['CountryImage']['id'], 'url' => '/admin/country_images/delete/'));
			echo $this->Form->create('CountryImage', array('type' => 'file', 'url' => '/admin/country_images/new'));
			echo $this->Form->input('country_id', array('type' => 'hidden', 'value' => $this->request->data['Country']['id']));
			echo $this->Form->input('id', array('type' => 'hidden', 'value' => $image['CountryImage']['id']));
			echo $this->Form->input('title', array('value' => $image['CountryImage']['title']));
			echo $this->Form->input('image_file', array('type' => 'file'));
			if(isset($this->request->data['CountryImage']['image_file']) && !empty($this->request->data['CountryImage']['image_file'])){
				echo $this->Html->image($this->request->data['CountryImage']['image_file'], array('width' => 100));	
			}
			echo $this->Form->end(__d('cake', __('Submit')));
		}

		echo $this->Form->create('CountryImage', array('type' => 'file', 'url' => '/admin/country_images/new'));
			echo $this->Form->input('title');
			echo $this->Form->input('country_id', array('type' => 'hidden', 'value' => $this->request->data['Country']['id']));
			echo $this->Form->input('image_file', array('type' => 'file'));
			echo $this->Form->end(__d('cake', __('Submit')));
	?>
</div>