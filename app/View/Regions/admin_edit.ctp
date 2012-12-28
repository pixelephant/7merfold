<?php $this->Html->script('admin', array('inline' => false)); ?>
<div class="actions">
	<?php echo $this->element('admin/admin_menu'); ?>
</div>

<div class="regions form">
<?php
	// print_r($this->validationErrors);
	echo $this->Form->create('Region', array('type' => 'file', 'url' => '/admin/regions/new'));
	echo $this->Form->input('id', array('type' => 'hidden', 'value' => $this->request->data['Region']['id']));
	echo $this->Form->input('slug', array('type' => 'hidden', 'value' => ''));
	echo $this->Form->input('name');
	echo $this->Form->input('country_id');
	echo $this->Form->input('description');
	echo $this->Form->input('keywords');
	echo $this->Form->input('title');
	echo $this->Form->end(__d('cake', __('Submit')));
?>
	<a href="javascript:history.back()">Mégsem</a>

	<?php 
		$i = 1;
		foreach ($images as $image){
			echo '<h3>' . $i . '. kép</h3>';
			echo $this->element('admin/admin_delete', array('id' => $image['RegionImage']['id'], 'url' => '/admin/region_images/delete/'));
			echo $this->Form->create('RegionImage', array('type' => 'file', 'url' => '/admin/region_images/new'));
			echo $this->Form->input('region_id', array('type' => 'hidden', 'value' => $this->request->data['Region']['id']));
			echo $this->Form->input('id', array('type' => 'hidden', 'value' => $image['RegionImage']['id']));
			echo $this->Form->input('title', array('value' => $image['RegionImage']['title']));
			echo $this->Form->input('image_file', array('type' => 'file'));
			if(isset($this->request->data['RegionImage']['image_file']) && !empty($this->request->data['RegionImage']['image_file'])){
				echo $this->Html->image($this->request->data['RegionImage']['image_file'], array('width' => 100));	
			}
			echo $this->Form->end(__d('cake', __('Submit')));
			$i++;
		}

		echo '<h3>' . $i . '. kép</h3>';
		echo $this->Form->create('RegionImage', array('type' => 'file', 'url' => '/admin/region_images/new'));
			echo $this->Form->input('title');
			echo $this->Form->input('region_id', array('type' => 'hidden', 'value' => $this->request->data['Region']['id']));
			echo $this->Form->input('image_file', array('type' => 'file'));
			echo $this->Form->end(__d('cake', __('Submit')));
	?>
</div>