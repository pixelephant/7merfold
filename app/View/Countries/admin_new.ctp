<?php $this->Html->script('admin', array('inline' => false)); ?>
<div class="actions">
	<?php echo $this->element('admin/admin_menu'); ?>
</div>

<div class="countries form">
<?php
	echo $this->Form->create('Country', array('type' => 'file', 'url' => '/admin/countries/new'));
	echo $this->Form->input('name');
	echo $this->Form->input('slug', array('type' => 'hidden', 'value' => ''));
	echo $this->Form->input('continent_id');
	echo $this->Form->input('information');
	echo $this->Form->input('useful_information');
	echo $this->Form->input('interesting_information');
	echo $this->Form->input('visa_info');
	echo $this->Form->input('keywords');
	echo $this->Form->input('title');
	echo $this->Form->input('image_file', array('type' => 'file'));
	echo $this->Form->end(__d('cake', __('Submit')));
?>
	<a href="javascript:history.back()">Mégsem</a> 
</div>