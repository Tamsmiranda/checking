<div class="publishers view">
<h2><?php  __('Publisher');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $publisher['Publisher']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $publisher['Publisher']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $publisher['Publisher']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Publisher Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($publisher['PublisherType']['name'], array('controller' => 'publisher_types', 'action' => 'view', $publisher['PublisherType']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created By'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $publisher['Publisher']['created_by']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified By'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $publisher['Publisher']['modified_by']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $publisher['Publisher']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $publisher['Publisher']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Publisher', true), array('action' => 'edit', $publisher['Publisher']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Publisher', true), array('action' => 'delete', $publisher['Publisher']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $publisher['Publisher']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Publishers', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Publisher', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Publisher Types', true), array('controller' => 'publisher_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Publisher Type', true), array('controller' => 'publisher_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clipps', true), array('controller' => 'clipps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clipp', true), array('controller' => 'clipps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sections', true), array('controller' => 'sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Section', true), array('controller' => 'sections', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Clipps');?></h3>
	<?php if (!empty($publisher['Clipp'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Publish Date'); ?></th>
		<th><?php __('Resume'); ?></th>
		<th><?php __('Content'); ?></th>
		<th><?php __('Evaluation Id'); ?></th>
		<th><?php __('Status Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Created By'); ?></th>
		<th><?php __('Modified By'); ?></th>
		<th><?php __('Customer Id'); ?></th>
		<th><?php __('Publisher Type Id'); ?></th>
		<th><?php __('Publisher Id'); ?></th>
		<th><?php __('Section Id'); ?></th>
		<th><?php __('Subject Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($publisher['Clipp'] as $clipp):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $clipp['id'];?></td>
			<td><?php echo $clipp['title'];?></td>
			<td><?php echo $clipp['publish_date'];?></td>
			<td><?php echo $clipp['resume'];?></td>
			<td><?php echo $clipp['content'];?></td>
			<td><?php echo $clipp['evaluation_id'];?></td>
			<td><?php echo $clipp['status_id'];?></td>
			<td><?php echo $clipp['created'];?></td>
			<td><?php echo $clipp['modified'];?></td>
			<td><?php echo $clipp['created_by'];?></td>
			<td><?php echo $clipp['modified_by'];?></td>
			<td><?php echo $clipp['customer_id'];?></td>
			<td><?php echo $clipp['publisher_type_id'];?></td>
			<td><?php echo $clipp['publisher_id'];?></td>
			<td><?php echo $clipp['section_id'];?></td>
			<td><?php echo $clipp['subject_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'clipps', 'action' => 'view', $clipp['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'clipps', 'action' => 'edit', $clipp['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'clipps', 'action' => 'delete', $clipp['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $clipp['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Clipp', true), array('controller' => 'clipps', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Sections');?></h3>
	<?php if (!empty($publisher['Section'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Created By'); ?></th>
		<th><?php __('Modified By'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($publisher['Section'] as $section):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $section['id'];?></td>
			<td><?php echo $section['name'];?></td>
			<td><?php echo $section['description'];?></td>
			<td><?php echo $section['created_by'];?></td>
			<td><?php echo $section['modified_by'];?></td>
			<td><?php echo $section['created'];?></td>
			<td><?php echo $section['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'sections', 'action' => 'edit', $section['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'sections', 'action' => 'delete', $section['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $section['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Section', true), array('controller' => 'sections', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
