<table cellspacing="0" cellpadding="0">
	<theader>
		<tr>
			<th><?php __('Publish Date'); ?></th>
			<th><?php __('Expiration Date'); ?></th>
			<th><?php __('Customer'); ?></th>
			<th><?php __('Advertiser'); ?></th>
			<th><?php __('Campaign'); ?></th>
			<th><?php __('Publisher Type'); ?></th>
			<th><?php __('Publisher'); ?></th>
			<th><?php __('Section'); ?></th>
			<th><?php __('Products'); ?></th>
			<th><?php __('Price'); ?></th>
			<th><?php __('Quantity'); ?></th>
		</tr>
	</theader>
	<tbody>
		<?php $i = 0; ?>
		<?php foreach ($checks as $check) : ?>
		<?php
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<?php
				if (isset($check['Json'])) {
					$rows = (count($check['Json']) );
				} else {
					$rows = 0;
				}
			?>
			<tr<?php echo $class;?>>
				<td rowspan="<?php echo $rows;?>"><?php echo date('d-m-Y',strtotime($check['Check']['publish_date']));?>&nbsp;</td>
				<td rowspan="<?php echo $rows;?>"><?php echo date('d-m-Y',strtotime($check['Check']['expiration_date']));?>&nbsp;</td>
				<td rowspan="<?php echo $rows;?>"><?php echo $check['Customer']['name']; ?>&nbsp;</td>
				<td rowspan="<?php echo $rows;?>"><?php echo $check['Advertiser']['name']; ?>&nbsp;</td>
				<td rowspan="<?php echo $rows;?>"><?php echo $check['Campaign']['name']; ?>&nbsp;</td>
				<td rowspan="<?php echo $rows;?>"><?php echo $check['PublisherType']['name']; ?>&nbsp;</td>
				<td rowspan="<?php echo $rows;?>"><?php echo $check['Publisher']['name']; ?>&nbsp;</td>
				<td rowspan="<?php echo $rows;?>"><?php echo $check['Section']['name']; ?>&nbsp;</td>
				<?php if ($rows <= 0) : ?>
				<td> - </td>
				<td> - </td>
				<td> - </td>
				<?php else : ?>
				<?php
					if (is_array($check['Json'])) {
						$product = $check['Json'][0];
						unset($check['Json'][0]);
					}
				?>
				<td><?php echo $product['product'];?></td>
				<td><?php echo $product['price'];?></td>
				<td><?php echo $product['quantity'] . $product['unity'];?></td>
				<?php endif; ?>
			</tr>
			<?php if ($rows > 0) : ?>
				<?php foreach ($check['Json'] as $product) : ?>
				<tr>
					<td><?php echo $product['product'];?></td>
					<td><?php echo $product['price'];?></td>
					<td><?php echo $product['quantity'] . $product['unity'];?></td>
				</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		<?php endforeach; ?>
	</tbody>
</table>