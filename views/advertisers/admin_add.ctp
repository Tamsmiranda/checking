<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Advertisers', true), array('action' => 'index'));?></li>
	</ul>
</div>
<div class="advertisers form">
<?php echo $this->Form->create('Advertiser', array('type' => 'file'));?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('logo', array('type' => 'file'));
		echo $this->Form->input('dir', array('type' => 'hidden'));
		echo $this->Form->input('mimetype', array('type' => 'hidden'));
		echo $this->Form->input('filesize', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div style="clear:both"></div>