<?php $this->Html->script('admin', array('inline' => false)); ?>
<div class="actions">
	<?php echo $this->element('admin/admin_menu'); ?>
</div>

<div class="contacts form">
<?php
	// print_r($this->validationErrors);
	echo $this->Form->create('Contact', array('type' => 'file', 'url' => '/admin/contacts/new'));
	echo $this->Form->input('id', array('type' => 'hidden', 'value' => $this->request->data['Contact']['id']));
	echo $this->Form->input('display');
	echo $this->Form->input('value');
	echo $this->Form->input('contact_type', array('options' => array('Telefon', 'Google Maps', 'Fax', 'Email', 'Facebook', 'Hírlevél', 'Google+')));
	echo $this->Form->input('position');
	echo $this->Form->end(__d('cake', __('Submit')));
?>
	<a href="javascript:history.back()">Mégsem</a>
</div>