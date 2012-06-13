<div class="checks view">
<h2><?php  __('Check');?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('List Checks', true), array('action' => 'index')); ?> </li>
		</ul>
	</div>
	<?php echo $this->element('check_table'); ?>
</div>

