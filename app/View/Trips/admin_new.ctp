<?php $this->Html->script('admin', array('inline' => false)); ?>
<div class="actions">
	<?php echo $this->element('admin/admin_menu'); ?>
</div>

<div class="trips form">
<?php echo $this->element('admin/form_' . $type); ?>

<?php 
	// echo $this->Form->create('Program', array('type' => 'file'));
	// echo $this->Form->input('name');
	// echo $this->Form->input('description');
	// echo $this->Form->input('image_file', array('type' => 'file'));
	// echo $this->Form->end(__d('cake', __('Submit')));
?>

<a href="javascript:history.back()">Mégsem</a> 
</div>