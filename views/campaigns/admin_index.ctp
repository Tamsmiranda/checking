<div class="campaigns index">
	<h2><?php __('Campaigns');?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Campaign', true), array('action' => 'add')); ?></li>
		</ul>
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('advertiser_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($campaigns as $campaign):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $campaign['Campaign']['name']; ?>&nbsp;</td>
		<td>
			<?php echo $campaign['Advertiser']['name']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $campaign['Campaign']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $campaign['Campaign']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $campaign['Campaign']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $campaign['Campaign']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="paging"><?php echo $paginator->numbers(); ?></div>
	<div class="counter"><?php echo $paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true))); ?></div>
	</div>
</div>
