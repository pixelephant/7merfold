<?php $this->Html->script('admin', array('inline' => false)); ?>
<div class="actions">
	<?php echo $this->element('admin/admin_menu'); ?>
</div>

<div class="news form">
<?php
	// print_r($this->validationErrors);
	echo $this->Form->create('News', array('type' => 'file', 'url' => '/admin/news/new'));
	echo $this->Form->input('id', array('type' => 'hidden', 'value' => $this->request->data['News']['id']));
	echo $this->Form->input('slug', array('type' => 'hidden', 'value' => ''));
	echo $this->Form->input('title');
	echo $this->Form->input('content');
	echo $this->Form->input('image_file', array('type' => 'file'));
	if(isset($this->request->data['News']['image_file']) && !empty($this->request->data['News']['image_file'])){
		echo $this->Html->image($this->request->data['News']['image_file'], array('width' => 100));	
	}
	echo $this->Form->input('keywords');
	echo $this->Form->input('page_title');
	echo $this->Form->end(__d('cake', __('Submit')));
?>
	<a href="javascript:history.back()">Mégsem</a>
</div>