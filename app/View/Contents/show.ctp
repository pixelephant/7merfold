<?php if(!empty($content['Content']['block_1_content'])){ ?>
	<section class="section">
		<h2><?php echo $content['Content']['block_1_title']; ?></h2>
		<div class="cont formatted">
			<?php echo $content['Content']['block_1_content']; ?>
		</div>
		<?php echo $this->element('totop'); ?>
	</section>
<?php } ?>

<?php if(!empty($content['Content']['block_2_content'])){ ?>
	<section class="section">
		<h2><?php echo $content['Content']['block_2_title']; ?></h2>
		<div class="cont formatted">
			<?php echo $content['Content']['block_2_content']; ?>
		</div>
		<?php echo $this->element('totop'); ?>
	</section>
<?php } ?>

<?php if(!empty($content['Content']['block_3_content'])){ ?>
	<section class="section">
		<h2><?php echo $content['Content']['block_3_title']; ?></h2>
		<div class="cont formatted">
			<?php echo $content['Content']['block_3_content']; ?>
		</div>
		<?php echo $this->element('totop'); ?>
	</section>
<?php } ?>