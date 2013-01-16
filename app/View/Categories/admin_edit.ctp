<?php $this->Html->script('admin', array('inline' => false)); ?>
<div class="actions">
	<?php echo $this->element('admin/admin_menu'); ?>
</div>

<div class="categories form">
<?php
	// print_r($this->validationErrors);
	echo $this->Form->create('Category', array('type' => 'file', 'url' => '/admin/categories/new'));
	echo $this->Form->input('id', array('type' => 'hidden', 'value' => $this->request->data['Category']['id']));
	echo $this->Form->input('slug', array('type' => 'hidden', 'value' => $this->request->data['Category']['slug']));
	echo $this->Form->input('name');	
	echo $this->Form->input('position');	
	echo $this->Form->input('keywords');
	echo $this->Form->input('title');
	echo $this->Form->end(__d('cake', __('Submit')));
?>
	<a href="javascript:history.back()">Mégsem</a>
</div>