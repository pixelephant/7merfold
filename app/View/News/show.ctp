<section class="section">
	<h2><?php echo $news['News']['title']; ?></h2>
	<div class="cont formatted">
		<?php echo $news['News']['content']; ?>
	</div>
	<div class="cont formatted">
		<h3>További híreink:</h3>
			<ul class="list">
				<?php 
					foreach($all_news as $new){
						echo '<li>' . $this->Html->link($new['News']['title'], '/hirek/' . $new['News']['slug']) . '</li>';
					}
				?>
			</ul>
	</div>
	<?php echo $this->element('totop'); ?>
</section>