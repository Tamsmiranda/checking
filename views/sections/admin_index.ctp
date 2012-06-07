<div class="sections index">
	<h2><?php __('Sections');?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Section', true), array('action' => 'add')); ?></li>
		</ul>
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('created_by');?></th>
			<th><?php echo $this->Paginator->sort('modified_by');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($sections as $section):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $section['Section']['name']; ?>&nbsp;</td>
		<td><?php echo $section['Section']['description']; ?>&nbsp;</td>
		<td><?php echo $section['CreatedBy']['name']; ?>&nbsp;</td>
		<td><?php echo $section['ModifiedBy']['name']; ?>&nbsp;</td>
		<td><?php echo $section['Section']['created']; ?>&nbsp;</td>
		<td><?php echo $section['Section']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $section['Section']['id'])); ?>
			<?php echo $this->Html->link(__('Copiar', true), array('action' => 'edit', $section['Section']['id'], 'copy:true')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $section['Section']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $section['Section']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="paging"><?php echo $paginator->numbers(); ?></div>
	<div class="counter"><?php echo $paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true))); ?></div>
	</div>
</div>
