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
	        echo $this->Form->input('id',array('type'=>'hidden'));
		echo $this->Form->input('Mode.copy',array('type'=>'hidden','value'=> $copy));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
