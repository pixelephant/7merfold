<?php $this->Html->script('admin', array('inline' => false)); ?>
<div class="actions">
	<?php echo $this->element('admin/admin_menu'); ?>
</div>

<div class="contents form">
<?php
	// print_r($this->validationErrors);
	echo $this->Form->create('Content', array('type' => 'file', 'url' => '/admin/contents/new'));
	echo $this->Form->input('id', array('type' => 'hidden', 'value' => $this->request->data['Content']['id']));
	echo $this->Form->input('title');
	echo $this->Form->input('block_1_title');
	echo $this->Form->input('block_1_content');
	echo $this->Form->input('block_2_title');
	echo $this->Form->input('block_2_content');
	echo $this->Form->input('block_3_title');
	echo $this->Form->input('block_3_content');
	echo $this->Form->input('keywords');
	// echo $this->Form->input('title');
	echo $this->Form->end(__d('cake', __('Submit')));
?>
	<a href="javascript:history.back()">Mégsem</a>
</div>