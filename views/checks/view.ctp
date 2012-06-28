<div class="client checks view">
<h2><?php  __('Check');?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('List Checks', true), array('action' => 'index')); ?> </li>
		</ul>
	</div>
	<?php 
		foreach ($checks as $check) {
			if ($check['Check']['file']) {
				echo $this->Preview->size($this->Html->url('/',true) . 'files/checks/' . $check['Check']['file'],240,180);
			}
		}
		 ?>
		<?php echo $this->element('check_table'); ?>
</div>
<script src="<?php echo $this->webroot;?>js/flowplayer-3.2.6.min.js"></script>
<script>
	$(document).ready(function() {
		flowplayer("a.player", "<?php echo $this->webroot;?>swf/flowplayer-3.2.7.swf");
	});
</script>
