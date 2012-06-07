<div class="advertisers form">
<?php echo $this->Form->create('Advertiser');?>
	<fieldset>
		<legend><?php __('Edit Advertiser'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Advertiser.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Advertiser.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Advertisers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Checks', true), array('controller' => 'checks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Check', true), array('controller' => 'checks', 'action' => 'add')); ?> </li>
	</ul>
</div>