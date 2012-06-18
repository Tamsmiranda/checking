<table>
	<theader>
		<tr>
			<td><?php __('Publish Date'); ?></td>
			<td><?php __('Expiration Date'); ?></td>
			<td><?php __('Customer'); ?></td>
			<td><?php __('Advertiser'); ?></td>
			<td><?php __('Campaign'); ?></td>
			<td><?php __('Publisher Type'); ?></td>
			<td><?php __('Publisher'); ?></td>
			<td><?php __('Section'); ?></td>
			<td><?php __('Products'); ?></td>
			<td><?php __('Price'); ?></td>
			<td><?php __('Quantity'); ?></td>
		</tr>
	</theader>
	<tbody>
		<?php foreach ($checks as $check) : ?>
			<?php $rows = (count($check['Json']) );?>
			<tr>
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