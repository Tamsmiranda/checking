<div class="publishers form">
	<h2><?php __('Add Publisher'); ?></h2>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Publishers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Publisher Types', true), array('controller' => 'publisher_types', 'action' => 'index')); ?></li>
		<!--<li><?php //echo $this->Html->link(__('List Sections', true), array('controller' => 'sections', 'action' => 'index')); ?> </li>-->
	</ul>
</div>
<?php echo $this->Form->create('Publisher', array('type' => 'file'));?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('publisher_type_id');
		if ($this->data['Publisher']['logo']) {
			echo $this->Html->image($this->Html->url('/',true) . 'files/publishers/logos/' . $this->data['Publisher']['logo']);
		}
		echo $this->Form->input('logo', array('type' => 'file'));
		echo $this->Form->input('dir', array('type' => 'hidden'));
		echo $this->Form->input('mimetype', array('type' => 'hidden'));
		echo $this->Form->input('filesize', array('type' => 'hidden'));
		//echo $this->Form->input('Section');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div><div style="clear:both"></div>