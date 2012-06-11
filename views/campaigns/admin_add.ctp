<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Campaigns', true), array('action' => 'index'));?></li>
	</ul>
</div>
<div class="campaigns form">
<?php echo $this->Form->create('Campaign');?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('advertiser_id');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div style="clear:both"></div>
