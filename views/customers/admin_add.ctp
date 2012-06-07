<div class="customers form">
<h2><?php __('Add Customer'); ?></h2>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Customers', true), array('action' => 'index'));?></li>
	</ul>
</div>
<?php echo $this->Form->create('Customer',array('type' => 'file'));?>
	<fieldset>
	<div class="tabs">
		<ul>
			<li><a href="#customer-basic"><span><?php __('Customer'); ?></span></a></li>
			<li><a href="#customer-access"><span><?php __('Access'); ?></span></a></li>
			<?php echo $this->Layout->adminTabs(); ?>
		</ul>
		<div id="customer-basic">
		<?php
			echo $this->Form->input('name');
			echo $this->Form->input('social_name');
			//echo $this->Form->input('cnpj');
			echo $this->Form->input('phone');
			echo $this->Form->input('contact');
			//echo $this->Form->input('logo');
			echo $this->Form->input('picture', array('type' => 'file','label'=>'Logo'));
			//echo $this->Form->input('user_id');
			//echo $this->Form->input('name');
			//echo $this->Form->input('description');
			//echo $this->Form->input('clipp_id');
		?>
		</div>
		<div id="customer-access">
		<?php
			echo $this->Form->input('User.role_id',array('empty'=>__('Select',true)));
			echo $this->Form->input('User.username');
			echo $this->Form->input('User.password');
			//echo $this->Form->input('User.name');
			echo $this->Form->input('User.email');
			echo $this->Form->input('User.website');
			echo $this->Form->input('User.status');
		?>
		</div>
	</div>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
<div style="clear: both"></div>