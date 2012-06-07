<div class="sections form">
<h2><?php __('Add Section'); ?></h2>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Sections', true), array('action' => 'index'));?></li>
	</ul>
</div>
<?php echo $this->Form->create('Section');?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('publisher_id',array('empty'=>__('Select',true)));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div><div style="clear:both"></div>