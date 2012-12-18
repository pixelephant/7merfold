<form action="<?php echo $this->Html->url($url.$id); ?>" name="post_<?php echo $id; ?>" id="post_<?php echo $id; ?>" style="display:none;" method="post">
		<input type="hidden" name="_method" value="POST"></form>
		<a href="#" onclick="if (confirm('Biztosan törlöd?')) { document.post_<?php echo $id; ?>.submit(); } event.returnValue = false; return false;">Töröl</a>