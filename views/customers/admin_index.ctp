<div class="customers index">
	<h2><?php __('Customers');?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Customer', true), array('action' => 'add')); ?></li>
		</ul>
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('social_name');?></th>
			<!-- <th><?php echo $this->Paginator->sort('cnpj');?></th> -->
			<th><?php echo $this->Paginator->sort('phone');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($customers as $customer):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $customer['Customer']['name']; ?>&nbsp;</td>
		<td><?php echo $customer['Customer']['social_name']; ?>&nbsp;</td>
		<!-- <td><?php echo $customer['Customer']['cnpj']; ?>&nbsp;</td> -->
		<td><?php echo $customer['Customer']['phone']; ?>&nbsp;</td>
		<td>
			<?php echo $customer['User']['name']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $customer['Customer']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $customer['Customer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $customer['Customer']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="paging"><?php echo $paginator->numbers(); ?></div>
	<div class="counter"><?php echo $paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true))); ?></div>
	</div>
