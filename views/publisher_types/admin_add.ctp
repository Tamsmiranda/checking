<div class="publisherTypes form">
<h2><?php __('Add Publisher Type'); ?></h2>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Publisher Types', true), array('action' => 'index'));?></li>
	</ul>
</div>
<?php echo $this->Form->create('PublisherType');?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>