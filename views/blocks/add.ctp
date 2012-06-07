<div class="blocks form">
<?php echo $this->Form->create('Block');?>
	<fieldset>
		<legend><?php __('Add Block'); ?></legend>
	<?php
		echo $this->Form->input('region_id');
		echo $this->Form->input('title');
		echo $this->Form->input('alias');
		echo $this->Form->input('body');
		echo $this->Form->input('show_title');
		echo $this->Form->input('class');
		echo $this->Form->input('status');
		echo $this->Form->input('weight');
		echo $this->Form->input('element');
		echo $this->Form->input('visibility_roles');
		echo $this->Form->input('visibility_paths');
		echo $this->Form->input('visibility_php');
		echo $this->Form->input('params');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Blocks', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Regions', true), array('controller' => 'regions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region', true), array('controller' => 'regions', 'action' => 'add')); ?> </li>
	</ul>
</div>