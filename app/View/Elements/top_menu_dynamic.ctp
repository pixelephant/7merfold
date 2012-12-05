<?php 
	$menu = $this->requestAction('home/get_menu');
 	foreach($menu as $k => $e){
?>
	<li>
<?php
		$img = $this->Html->image($k . '.png', array('alt' => $e));
 		echo $this->Html->link($img . $e, '/' . $k, array('escape' => false));
?>
	</li>
<?php
 	}
?>