<div class="publishers index">
	<h2><?php __('Publishers');?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Publisher', true), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Publisher Types', true), array('controller' => 'publisher_types', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('List Sections', true), array('controller' => 'sections', 'action' => 'index')); ?> </li>
		</ul>
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('publisher_type_id');?></th>
			<th><?php echo $this->Paginator->sort('created_by');?></th>
			<th><?php echo $this->Paginator->sort('modified_by');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($publishers as $publisher):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $publisher['Publisher']['name']; ?>&nbsp;</td>
		<td><?php echo $publisher['Publisher']['description']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($publisher['PublisherType']['name'], array('controller' => 'publisher_types', 'action' => 'view', $publisher['PublisherType']['id'])); ?>
		</td>
		<td><?php echo $publisher['CreatedBy']['name']; ?>&nbsp;</td>
		<td><?php echo $publisher['ModifiedBy']['name']; ?>&nbsp;</td>
		<td><?php echo $publisher['Publisher']['created']; ?>&nbsp;</td>
		<td><?php echo $publisher['Publisher']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $publisher['Publisher']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $publisher['Publisher']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $publisher['Publisher']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="paging"><?php echo $paginator->numbers(); ?></div>
	<div class="counter"><?php echo $paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true))); ?></div>
	</div>
</div>
