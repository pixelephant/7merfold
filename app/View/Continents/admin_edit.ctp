<?php $this->Html->script('admin', array('inline' => false)); ?>
<div class="actions">
	<?php echo $this->element('admin/admin_menu'); ?>
</div>

<div class="continents form">
<?php
	// print_r($this->validationErrors);
	echo $this->Form->create('Continent', array('type' => 'file', 'url' => '/admin/continents/new'));
	echo $this->Form->input('id', array('type' => 'hidden', 'value' => $this->request->data['Continent']['id']));
	echo $this->Form->input('slug', array('type' => 'hidden', 'value' => $this->request->data['Continent']['slug']));
	echo $this->Form->input('name');
	// echo $this->Form->input('country_id');
	echo $this->Form->input('information');
	echo $this->Form->input('image_file', array('type' => 'file'));
	echo $this->Form->input('keywords');
	echo $this->Form->input('title');
	echo $this->Form->end(__d('cake', __('Submit')));
?>
	<a href="javascript:history.back()">Mégsem</a>

	<?php 
		$i = 1;
		foreach ($images as $image){
			echo '<h3>' . $i . '. kép</h3>';
			echo $this->element('admin/admin_delete', array('id' => $image['ContinentImage']['id'], 'url' => '/admin/continent_images/delete/'));
			echo $this->Form->create('ContinentImage', array('type' => 'file', 'url' => '/admin/continent_images/new'));
			echo $this->Form->input('continent_id', array('type' => 'hidden', 'value' => $this->request->data['Continent']['id']));
			echo $this->Form->input('id', array('type' => 'hidden', 'value' => $image['ContinentImage']['id']));
			echo $this->Form->input('title', array('value' => $image['ContinentImage']['title']));
			echo $this->Form->input('image_file', array('type' => 'file'));
			
			if(isset($image['ContinentImage']['image_file'])){
				echo $this->Html->image($image['ContinentImage']['image_file'], array('width' => 100));	
			}
			echo $this->Form->end(__d('cake', __('Submit')));
			$i++;
		}

		echo '<h3>' . $i . '. kép</h3>';
		echo $this->Form->create('ContinentImage', array('type' => 'file', 'url' => '/admin/continent_images/new'));
			echo $this->Form->input('title');
			echo $this->Form->input('continent_id', array('type' => 'hidden', 'value' => $this->request->data['Continent']['id']));
			echo $this->Form->input('image_file', array('type' => 'file'));
			echo $this->Form->end(__d('cake', __('Submit')));
	?>

</div>