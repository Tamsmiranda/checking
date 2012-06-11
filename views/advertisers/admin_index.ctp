<div class="advertisers index">
	<h2><?php __('Advertisers');?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Advertiser', true), array('action' => 'add')); ?></li>
		</ul>
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($advertisers as $advertiser):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $advertiser['Advertiser']['name']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $advertiser['Advertiser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $advertiser['Advertiser']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $advertiser['Advertiser']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $advertiser['Advertiser']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
		<div class="paging"><?php echo $paginator->numbers(); ?></div>
	<div class="counter"><?php echo $paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true))); ?></div>
	</div>
</div>