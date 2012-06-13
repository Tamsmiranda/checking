<!-- render in XLS -->
<?php
	header('Content-Type: application/vnd.ms-excel; charset=utf-8');
	header('Content-Disposition: attachment; filename="checking.xls"');
	header('Content-Transfer-Encoding: binary');
?>
<?php echo $this->element('check_table'); ?>
<!-- end XLS -->