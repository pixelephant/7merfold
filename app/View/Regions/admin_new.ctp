<?php $this->Html->script('admin', array('inline' => false)); ?>
<div class="actions">
	<?php echo $this->element('admin/admin_menu'); ?>
</div>

<div class="regions form">
<?php
	// print_r($this->validationErrors);
	echo $this->Form->create('Region', array('type' => 'file', 'url' => '/admin/regions/new'));
	echo $this->Form->input('name');
	echo $this->Form->input('description');
	echo $this->Form->input('country_id');
	echo $this->Form->input('keywords');
	echo $this->Form->input('title');
	echo $this->Form->end(__d('cake', __('Submit')));
?>
	<a href="javascript:history.back()">Mégsem</a> 
</div>