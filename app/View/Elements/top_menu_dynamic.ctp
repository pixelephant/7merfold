<ul id="sub-grid">
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
	<li><?php echo $this->Html->link($this->Html->image('cegeknek.png', array('alt' => 'Cégeknek')) . 'Cégeknek', '/cegeknek', array('escape' => false)); ?></li>
  <li>
    <?php echo $this->Html->link($this->Html->image('szolg.png', array('alt' => 'Szolgáltatások')) . 'Szolgáltatások', '/szolgaltatasok', array('escape' => false)); ?>
  </li>
</ul>

<?php 
	$i = 1;
	foreach($menu as $k => $e){
		echo '<ul id="sub' . $i . '" class="sub">';
		echo $this->requestAction('menu/get_sub_menu/' . $k);
		// foreach ($sub_menu as $slug => $name){
		// 	echo '<li>' . $this->Html->link($name, '/utjaink/' . $slug) . '</li>';
		// }
		echo '</ul>';
		$i++;
	}
?>