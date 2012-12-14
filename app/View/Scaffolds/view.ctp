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
<div class="<?php echo $pluralVar; ?> view">
	<h2><?php echo __('View %s', __($singularHumanName)); ?></h2>
	<dl>
<?php
$i = 0;
foreach ($scaffoldFields as $_field) {
	$isKey = false;
	if (!empty($associations['belongsTo'])) {
		foreach ($associations['belongsTo'] as $_alias => $_details) {
			if ($_field === $_details['foreignKey']) {
				$isKey = true;
				echo "\t\t<dt>" . __(Inflector::humanize($_alias)) . "</dt>\n";
				echo "\t\t<dd>\n\t\t\t";
				echo $this->Html->link(
					${$singularVar}[$_alias][$_details['displayField']],
					array('plugin' => $_details['plugin'], 'controller' => $_details['controller'], 'action' => 'view', ${$singularVar}[$_alias][$_details['primaryKey']])
				);
				echo "\n\t\t&nbsp;</dd>\n";
				break;
			}
		}
	}
	if ($isKey !== true) {
		echo "\t\t<dt>" . __(Inflector::humanize($_field)) . "</dt>\n";
		echo "\t\t<dd>" . h(${$singularVar}[$modelClass][$_field]) . "&nbsp;</dd>\n";
	}
}
?>
	</dl>

	<?php 
		/* Térkép kirajzolás útvonalnál */
		if($pluralVar == 'maps'){
			$api_key = "&key=AIzaSyAAYzbqZTGF0buhn2MFujznTcMxr1rpP_Y";
      $url = "http://maps.googleapis.com/maps/api/staticmap?sensor=true&scale=2&size=352x352";
      $url .= $api_key;
      $path = "&path=color:0x69297d%7Cweight:5|";
      $markers = "&markers=color:blue|";

      $path .= ${$singularVar}[$modelClass]['lat'].",".${$singularVar}[$modelClass]['lng'];
      $markers .= ${$singularVar}[$modelClass]['lat'].",".${$singularVar}[$modelClass]['lng'];

      $url .= $path . $markers;

      echo '<br /><img src=' . $url . ' alt="Útvonal" />';

		}
	 ?>

</div>
<div class="actions">	
<?php
	$additional = "\t\t<li>";
	$additional .= $this->Html->link(__d('cake', '%s szerkesztése', __($singularHumanName)),   array('action' => 'edit', ${$singularVar}[$modelClass][$primaryKey]));
	$additional .= " </li>\n";

	$additional .= "\t\t<li>";
	$additional .= $this->Form->postLink(__d('cake', '%s törlése', __($singularHumanName)), array('action' => 'delete', ${$singularVar}[$modelClass][$primaryKey]), null, __d('cake', 'Biztosan törlöd?').' #' . ${$singularVar}[$modelClass][$primaryKey] . '?');
	$additional .= " </li>\n";
	$additional .= "<br /><br />";

	echo $this->element('admin/admin_menu', array('additional' => $additional));
?>
</div>
<?php
if (!empty($associations['hasOne'])) :
foreach ($associations['hasOne'] as $_alias => $_details): ?>
<div class="related">
	<h3><?php echo __d('cake', "Kapcsolódó %s", __(Inflector::humanize($_details['controller']))); ?></h3>
<?php if (!empty(${$singularVar}[$_alias])): ?>
	<dl>
<?php
		$i = 0;
		$otherFields = array_keys(${$singularVar}[$_alias]);
		foreach ($otherFields as $_field) {
			echo "\t\t<dt>" . __(Inflector::humanize($_field)) . "</dt>\n";
			echo "\t\t<dd>\n\t" . ${$singularVar}[$_alias][$_field] . "\n&nbsp;</dd>\n";
		}
?>
	</dl>
<?php endif; ?>
	<div class="actions">
		<ul>
		<li><?php
			echo $this->Html->link(
				__d('cake', 'Edit %s', Inflector::humanize(Inflector::underscore($_alias))),
				array('plugin' => $_details['plugin'], 'controller' => $_details['controller'], 'action' => 'edit', ${$singularVar}[$_alias][$_details['primaryKey']])
			);
			echo "</li>\n";
			?>
		</ul>
	</div>
</div>
<?php
endforeach;
endif;

if (empty($associations['hasMany'])) {
	$associations['hasMany'] = array();
}
if (empty($associations['hasAndBelongsToMany'])) {
	$associations['hasAndBelongsToMany'] = array();
}
$relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
$i = 0;
foreach ($relations as $_alias => $_details):
$otherSingularVar = Inflector::variable($_alias);
?>
<div class="related">
	<h3><?php echo __d('cake', "Kapcsolódó %s", __(Inflector::humanize($_details['controller']))); ?></h3>
<?php if (!empty(${$singularVar}[$_alias])): ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
<?php
		$otherFields = array_keys(${$singularVar}[$_alias][0]);
		if (isset($_details['with'])) {
			$index = array_search($_details['with'], $otherFields);
			unset($otherFields[$index]);
		}
		foreach ($otherFields as $_field) {
			echo "\t\t<th>" . __(Inflector::humanize($_field)) . "</th>\n";
		}
?>
		<th class="actions">Actions</th>
	</tr>
<?php
		$i = 0;
		foreach (${$singularVar}[$_alias] as ${$otherSingularVar}):
			echo "\t\t<tr>\n";

			foreach ($otherFields as $_field) {
				echo "\t\t\t<td>" . ${$otherSingularVar}[$_field] . "</td>\n";
			}

			echo "\t\t\t<td class=\"actions\">\n";
			echo "\t\t\t\t";
			echo $this->Html->link(
				__d('cake', __('View')),
				array('plugin' => $_details['plugin'], 'controller' => $_details['controller'], 'action' => 'view', ${$otherSingularVar}[$_details['primaryKey']])
			);
			echo "\n";
			echo "\t\t\t\t";
			echo $this->Html->link(
				__d('cake', __('Edit')),
				array('plugin' => $_details['plugin'], 'controller' => $_details['controller'], 'action' => 'edit', ${$otherSingularVar}[$_details['primaryKey']])
			);
			echo "\n";
			echo "\t\t\t\t";
			echo $this->Form->postLink(
				__d('cake', __('Delete')),
				array('plugin' => $_details['plugin'], 'controller' => $_details['controller'], 'action' => 'delete', ${$otherSingularVar}[$_details['primaryKey']]),
				null,
				__d('cake', 'Biztosan törlöd', true) .' #' . ${$otherSingularVar}[$_details['primaryKey']] . '?'
			);
			echo "\n";
			echo "\t\t\t</td>\n";
		echo "\t\t</tr>\n";
		endforeach;
?>
	</table>
<?php endif; ?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(
				__d('cake', "Új %s", __(Inflector::humanize(Inflector::underscore($_alias)))),
				array('plugin' => $_details['plugin'], 'controller' => $_details['controller'], 'action' => 'add')
			); ?> </li>
		</ul>
	</div>
</div>
<?php endforeach; ?>
