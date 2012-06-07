<div class="checks index">
	<h2><?php __('Checks');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('publish_date');?></th>
			<th><?php echo $this->Paginator->sort('resume');?></th>
			<th><?php echo $this->Paginator->sort('content');?></th>
			<th><?php echo $this->Paginator->sort('observation');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('created_by');?></th>
			<th><?php echo $this->Paginator->sort('modified_by');?></th>
			<th><?php echo $this->Paginator->sort('customer_id');?></th>
			<th><?php echo $this->Paginator->sort('publisher_type_id');?></th>
			<th><?php echo $this->Paginator->sort('publisher_id');?></th>
			<th><?php echo $this->Paginator->sort('section_id');?></th>
			<th><?php echo $this->Paginator->sort('params');?></th>
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
		<td><?php echo $check['Check']['id']; ?>&nbsp;</td>
		<td><?php echo $check['Check']['title']; ?>&nbsp;</td>
		<td><?php echo $check['Check']['publish_date']; ?>&nbsp;</td>
		<td><?php echo $check['Check']['resume']; ?>&nbsp;</td>
		<td><?php echo $check['Check']['content']; ?>&nbsp;</td>
		<td><?php echo $check['Check']['observation']; ?>&nbsp;</td>
		<td><?php echo $check['Check']['created']; ?>&nbsp;</td>
		<td><?php echo $check['Check']['modified']; ?>&nbsp;</td>
		<td><?php echo $check['Check']['created_by']; ?>&nbsp;</td>
		<td><?php echo $check['Check']['modified_by']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($check['Customer']['name'], array('controller' => 'customers', 'action' => 'view', $check['Customer']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($check['PublisherType']['name'], array('controller' => 'publisher_types', 'action' => 'view', $check['PublisherType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($check['Publisher']['name'], array('controller' => 'publishers', 'action' => 'view', $check['Publisher']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($check['Section']['name'], array('controller' => 'sections', 'action' => 'view', $check['Section']['id'])); ?>
		</td>
		<td><?php echo $check['Check']['params']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $check['Check']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $check['Check']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $check['Check']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $check['Check']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Check', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Customers', true), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer', true), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Publisher Types', true), array('controller' => 'publisher_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Publisher Type', true), array('controller' => 'publisher_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Publishers', true), array('controller' => 'publishers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Publisher', true), array('controller' => 'publishers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sections', true), array('controller' => 'sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Section', true), array('controller' => 'sections', 'action' => 'add')); ?> </li>
	</ul>
</div>