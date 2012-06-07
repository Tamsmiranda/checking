<div class="advertisers view">
<h2><?php  __('Advertiser');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $advertiser['Advertiser']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $advertiser['Advertiser']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $advertiser['Advertiser']['description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Advertiser', true), array('action' => 'edit', $advertiser['Advertiser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Advertiser', true), array('action' => 'delete', $advertiser['Advertiser']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $advertiser['Advertiser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Advertisers', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Advertiser', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Checks', true), array('controller' => 'checks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Check', true), array('controller' => 'checks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Checks');?></h3>
	<?php if (!empty($advertiser['Check'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Publish Date'); ?></th>
		<th><?php __('Expiration Date'); ?></th>
		<th><?php __('Resume'); ?></th>
		<th><?php __('Content'); ?></th>
		<th><?php __('Observation'); ?></th>
		<th><?php __('Square'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Created By'); ?></th>
		<th><?php __('Modified By'); ?></th>
		<th><?php __('Customer Id'); ?></th>
		<th><?php __('Publisher Type Id'); ?></th>
		<th><?php __('Publisher Id'); ?></th>
		<th><?php __('Section Id'); ?></th>
		<th><?php __('Advertiser Id'); ?></th>
		<th><?php __('Params'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($advertiser['Check'] as $check):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $check['id'];?></td>
			<td><?php echo $check['title'];?></td>
			<td><?php echo $check['publish_date'];?></td>
			<td><?php echo $check['expiration_date'];?></td>
			<td><?php echo $check['resume'];?></td>
			<td><?php echo $check['content'];?></td>
			<td><?php echo $check['observation'];?></td>
			<td><?php echo $check['square'];?></td>
			<td><?php echo $check['created'];?></td>
			<td><?php echo $check['modified'];?></td>
			<td><?php echo $check['created_by'];?></td>
			<td><?php echo $check['modified_by'];?></td>
			<td><?php echo $check['customer_id'];?></td>
			<td><?php echo $check['publisher_type_id'];?></td>
			<td><?php echo $check['publisher_id'];?></td>
			<td><?php echo $check['section_id'];?></td>
			<td><?php echo $check['advertiser_id'];?></td>
			<td><?php echo $check['params'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'checks', 'action' => 'view', $check['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'checks', 'action' => 'edit', $check['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'checks', 'action' => 'delete', $check['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $check['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Check', true), array('controller' => 'checks', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
