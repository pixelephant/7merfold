<?php if(count($breadcrumb) > 0){ ?>
<section class="breadcrumb clearfix">
	<ul>
		<li class="home"><a href="<?php echo $this->webroot; ?>"><span class="icon" aria-hidden="true" data-icon="h"></span></a></li>
		<?php foreach($breadcrumb as $link => $name){ ?>
			<li><a href="<?php echo $this->webroot . $link; ?>"><?php echo $name; ?></a></li>
		<?php } ?>
	</ul>
</section>
<?php } ?>