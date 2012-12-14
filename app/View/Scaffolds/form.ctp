<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Scaffolds
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="<?php echo $pluralVar; ?> form">
<?php
	echo $this->Form->create($modelClass, array('type' => $form_type));
	echo $this->Form->inputs($scaffoldFields, array('created', 'modified', 'updated'));
	foreach ($file_fields as $field_name) {
		echo $this->Form->input($field_name, array('type' => 'file'));
	}
	echo $this->Form->end(__d('cake', __('Submit')));
?>
</div>
<div class="actions">
<?php $additional = ''; ?>
<?php if ($this->request->action != 'add'): ?>
		<?php 
			$additional .= '<li>' . $this->Form->postLink(
			__d('cake', __('Delete')),
			array('action' => 'delete', $this->Form->value($modelClass . '.' . $primaryKey)),
			null,
			__d('cake', 'Biztosan törlöd: # %s?', $this->Form->value($modelClass . '.' . $primaryKey))) . '</li>';
			$additional .= "<br /><br />";
		?>
<?php endif; ?>
<?php
	echo $this->element('admin/admin_menu', array('additional' => $additional));
?>
</div>
