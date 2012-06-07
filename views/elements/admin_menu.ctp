<a href="#"><?php __('Clipping'); ?></a>
<ul>
    <li><?php echo $this->Html->link(__('Clipps', true), array('action'=>'index','controller'=>'clipps','plugin'=>'clipping')); ?></li>
    <li><?php echo $this->Html->link(__('Customers', true), array('action'=>'index','controller'=>'customers','plugin'=>'clipping')); ?></li>
	<li><?php echo $this->Html->link(__('Status', true), array('action'=>'index','controller'=>'statuses','plugin'=>'clipping')); ?></li>	
	<li><?php echo $this->Html->link(__('Evaluations', true), array('action'=>'index','controller'=>'evaluations','plugin'=>'clipping')); ?></li>
	<li><?php echo $this->Html->link(__('Publishers', true), array('action'=>'index','controller'=>'publishers','plugin'=>'clipping')); ?></li>
	<li><?php echo $this->Html->link(__('Sections', true), array('action'=>'index','controller'=>'sections','plugin'=>'clipping')); ?></li>
	<li><?php echo $this->Html->link(__('Subjects', true), array('action'=>'index','controller'=>'subjects','plugin'=>'clipping')); ?></li>
</ul>