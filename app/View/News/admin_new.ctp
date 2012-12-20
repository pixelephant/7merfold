<?php $this->Html->script('admin', array('inline' => false)); ?>
<div class="actions">
	<?php echo $this->element('admin/admin_menu'); ?>
</div>

<div class="news form">
<?php
	// print_r($this->validationErrors);
	echo $this->Form->create('News', array('type' => 'file', 'url' => '/admin/news/new'));
	echo $this->Form->input('title');
	echo $this->Form->input('content');
	echo $this->Form->input('image_file', array('type' => 'file'));
	echo $this->Form->input('keywords');
	echo $this->Form->input('page_title');
	echo $this->Form->end(__d('cake', __('Submit')));
?>
	<a href="javascript:history.back()">Mégsem</a> 
</div>