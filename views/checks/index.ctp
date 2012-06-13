<div class="checks index">
	<h2><?php __('Checks');?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Check', true), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('Export to Excel', true), '#', array('id' => 'excel')); ?></li>
			<li><?php echo $this->Html->link(__('Export to PDF', true), '#', array('id' => 'pdf')); ?></li>
		</ul>
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Form->input('checkAll', array('type'=>'checkbox','label'=>false,'id'=>'checkAll'));?></th>
		<th><?php echo $this->Paginator->sort('customer_id');?></th>
		<th><?php echo $this->Paginator->sort('publisher_type_id');?></th>
		<th><?php echo $this->Paginator->sort('publisher_id');?></th>
		<th><?php echo $this->Paginator->sort('section_id');?></th>
		<th><?php echo $this->Paginator->sort('publish_date');?></th>			
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($checks as $check):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $this->Form->input($check['Check']['id'],array('type'=>'checkbox','label'=>false,'class'=>'checkbox'));?></td>
		<td>
			<?php echo $check['Customer']['name']; ?>
		</td>
		<td>
			<?php echo $check['PublisherType']['name']; ?>
		</td>
		<td>
			<?php echo $check['Publisher']['name']; ?>
		</td>
		<td>
			<?php echo $check['Section']['name']; ?>
		</td>
		<td><?php echo date('G:i d-m-Y',strtotime($check['Check']['publish_date']));?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $check['Check']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="paging"><?php echo $paginator->numbers(); ?></div>
	<div class="counter"><?php echo $paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true))); ?></div>
	</div>
</div>
<script>
		function selectedChecks() {
			checks = Array();
			$(".checkbox").each(function()
				{
					if ( this.checked == true) {
						checks.push(this.id)
					}
				});
			return checks;
		}

		$(document).ready(function() {
			$("#checkAll").click(function()				
			{
				var checked_status = this.checked;
				$(".checkbox").each(function()
				{
					this.checked = checked_status;
				});
			});
		});
		
		// Export to excel
		$('#excel').click( function(){
			params = $.param({ id : selectedChecks()});
			window.location.replace("<?php echo $this->Html->url(array('admin' => true, 'plugin' => 'checking', 'controller' => 'checks', 'action' => 'view'));?>?" + params);
		});

</script>
<div class="clear"></div>

