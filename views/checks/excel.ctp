<!-- render in XLS -->
<?php
	header('Content-Type: application/vnd.ms-excel; charset=utf-8');
	header('Content-Disposition: attachment; filename="checking.xls"');
	header('Content-Transfer-Encoding: binary');
?>
<table>
	<?php $rows = (count($check['Json']) + 1);?>
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
			<td><?php __('Unity'); ?></td>
		</tr>
	</theader>
	<tbody>
		<tr>
			<td rowspan="<?php echo $rows;?>"><?php echo date('G:i d-m-Y',strtotime($check['Check']['publish_date']));?>&nbsp;</td>
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
			<td></td>
			<td></td>
			<td></td>
			<?php endif; ?>
		</tr>
		<?php if ($rows > 0) : ?>
			<?php foreach ($check['Json'] as $product) : ?>
			<tr>
				<td><?php echo $product['product'];?></td>
				<td><?php echo $product['price'];?></td>
				<td><?php echo $product['unity'];?></td>
			</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	</tbody>
</table>
<!-- end XLS -->