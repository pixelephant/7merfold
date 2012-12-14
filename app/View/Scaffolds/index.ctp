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
<div class="<?php echo $pluralVar; ?> index">
<h2><?php echo __($pluralHumanName); ?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
<?php foreach ($scaffoldFields as $_field): ?>
	<th><?php echo $this->Paginator->sort($_field); ?></th>
<?php endforeach; ?>
	<th><?php echo __d('cake', 'Műveletek'); ?></th>
</tr>
<?php
foreach (${$pluralVar} as ${$singularVar}):
	echo '<tr>';
		foreach ($scaffoldFields as $_field) {
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $_alias => $_details) {
					if ($_field === $_details['foreignKey']) {
						$isKey = true;
						echo '<td>' . $this->Html->link(__(${$singularVar}[$_alias][$_details['displayField']]), array('controller' => $_details['controller'], 'action' => 'view', ${$singularVar}[$_alias][$_details['primaryKey']])) . '</td>';
						break;
					}
				}
			}
			if ($isKey !== true) {
				/* Balázs */
				if(stripos($_field, "file")){
					echo '<td>' . $this->Html->image('thumbnails/'.h(${$singularVar}[$modelClass][$_field])) . '</td>';
				}else{
					if(strlen(h(${$singularVar}[$modelClass][$_field])) > 100){
						echo '<td>' . mb_substr(h(${$singularVar}[$modelClass][$_field]),0,100) . '...</td>';
					}else{
						echo '<td>' . h(${$singularVar}[$modelClass][$_field]) . '</td>';
					}
				}
				/* Balázs */
			}
		}

		echo '<td class="actions">';
		echo $this->Html->link(__d('cake', 'Mutat'), array('action' => 'view', ${$singularVar}[$modelClass][$primaryKey]));
		echo ' ' . $this->Html->link(__d('cake', 'Szerkeszt'), array('action' => 'edit', ${$singularVar}[$modelClass][$primaryKey]));
		echo ' ' . $this->Form->postLink(
			__d('cake', 'Töröl'),
			array('action' => 'delete', ${$singularVar}[$modelClass][$primaryKey]),
			null,
			__d('cake', 'Biztosan törlöd?').' #' . ${$singularVar}[$modelClass][$primaryKey]
		);
		echo '</td>';
	echo '</tr>';

endforeach;

?>
</table>
	<p><?php
	echo $this->Paginator->counter(array(
		'format' => __d('cake', '{:page} oldal {:pages} oldalból, {:current} sor mutatva a {:count} sorból, első elem: {:start}, utolsó elem: {:end}')
	));
	?></p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __d('cake', 'előző'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__d('cake', 'következő') .' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<!-- Bal menü -->
	<?php echo $this->element('admin/admin_menu'); ?>
</div>
