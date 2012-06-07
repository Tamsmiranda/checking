<div class="publishers form">
	<h2><?php __('Edit Publisher'); ?></h2>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Publishers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Publisher Types', true), array('controller' => 'publisher_types', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Sections', true), array('controller' => 'sections', 'action' => 'index', $this->data['Publisher']['id'])); ?> </li>
	</ul>
</div>
<?php echo $this->Form->create('Publisher');?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('publisher_type_id',array('empty'=>__('Select',true)));
		//echo $this->Form->input('Section');
        echo $this->Form->input('id',array('type'=>'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>