<div class="publishers form">
	<h2><?php __('Add Publisher'); ?></h2>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Publishers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Publisher Types', true), array('controller' => 'publisher_types', 'action' => 'index')); ?></li>
		<!--<li><?php //echo $this->Html->link(__('List Sections', true), array('controller' => 'sections', 'action' => 'index')); ?> </li>-->
	</ul>
</div>
<?php echo $this->Form->create('Publisher');?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('publisher_type_id');
		//echo $this->Form->input('Section');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div><div style="clear:both"></div>