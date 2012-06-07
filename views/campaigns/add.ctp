<div class="campaigns form">
<?php echo $this->Form->create('Campaign');?>
	<fieldset>
		<legend><?php __('Add Campaign'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('advertiser_id');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Campaigns', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Advertisers', true), array('controller' => 'advertisers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Advertiser', true), array('controller' => 'advertisers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Checks', true), array('controller' => 'checks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Check', true), array('controller' => 'checks', 'action' => 'add')); ?> </li>
	</ul>
</div>